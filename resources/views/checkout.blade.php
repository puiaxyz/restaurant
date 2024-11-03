@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>
    <form id="checkout-form">
        @csrf
        <div class="mb-3">
            <label for="address" class="form-label">Shipping Address</label>
            <textarea id="address" name="address" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>

<script>
document.getElementById('checkout-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    fetch('/api/checkout', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message);
            window.location.href = '/order-confirmation'; // Redirect to order confirmation page
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
</script>
@endsection
