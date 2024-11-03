@extends('layouts.app')

@section('content')
<h1>Order History</h1>
<div id="order-history"></div>

<script>
    axios.get('/api/order-history')
        .then(response => {
            const orders = response.data;
            const orderDiv = document.getElementById('order-history');
            if (orders.length === 0) {
                orderDiv.innerHTML = '<p>No orders found.</p>';
            } else {
                orders.forEach(order => {
                    orderDiv.innerHTML += `
                        <div>
                            <h4>Order ID: ${order.id}</h4>
                            <p>Status: ${order.status}</p>
                            <p>Total: $${order.total}</p>
                            <p>Date: ${new Date(order.created_at).toLocaleDateString()}</p>
                        </div>
                    `;
                });
            }
        })
        .catch(error => console.error(error));
</script>
@endsection
