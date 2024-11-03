@extends('layouts.app')

@section('content')
<h1>Menu</h1>
<div id="menu-items"></div>

<!-- Ensure Axios is included -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    // Fetch menu items from the API
    axios.get('/api/menu-items')
        .then(response => {
            const menuItems = response.data;
            const menuDiv = document.getElementById('menu-items');
            menuDiv.innerHTML = ''; // Clear any existing content

            // Loop through each item and display it
            menuItems.forEach(item => {
                menuDiv.innerHTML += `
                    <div>
                        <h4>${item.name} - $${item.price}</h4>
                        <p>${item.description}</p>
                        <input type="number" min="1" value="1" id="quantity-${item.id}">
                        <button onclick="addToCart(${item.id})">Add to Cart</button>
                    </div>
                `;
            });
        })
        .catch(error => console.error('Error fetching menu items:', error));

    // Function to add items to the cart
    function addToCart(id) {
        const quantity = document.getElementById(`quantity-${id}`).value;

        axios.post('/api/cart', {
            menu_item_id: id, // Ensure this matches your API parameter
            quantity: quantity
        })
        .then(response => {
            alert(response.data.message); // Alert user on success
        })
        .catch(error => console.error('Error adding to cart:', error));
    }
</script>
@endsection
