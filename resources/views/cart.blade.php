@extends('layouts.app')

@section('content')
<h1>Your Cart</h1>
<div id="cart-items"></div>

<script>
    axios.get('/api/cart')
        .then(response => {
            const cartItems = response.data;
            const cartDiv = document.getElementById('cart-items');

            if (cartItems.length === 0) {
                cartDiv.innerHTML = '<p>No items in your cart yet.</p>';
            } else {
                cartItems.forEach(item => {
                    cartDiv.innerHTML += `
                        <div>
                            <h4>Item: ${item.menu_item.name} - Quantity: ${item.quantity}</h4>
                            <button onclick="removeFromCart(${item.id})">Remove</button>
                        </div>
                    `;
                });
            }
        })
        .catch(error => console.error(error));

    function removeFromCart(id) {
        axios.delete(`/api/cart/${id}`)
            .then(response => {
                alert(response.data.message);
                location.reload(); // Refresh the cart to see updated items
            })
            .catch(error => console.error(error));
    }
</script>
@endsection
