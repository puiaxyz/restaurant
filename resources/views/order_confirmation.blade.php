@extends('layouts.app')

@section('content')
    <h1>Order Confirmation</h1>
    <p>Your order #{{ $order->id }} has been placed successfully.</p>
    <p>Total: ${{ $order->total_price }}</p>
@endsection
