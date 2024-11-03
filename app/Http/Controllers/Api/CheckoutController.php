<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Validate request
        $request->validate([
            'address' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Create a new order
        $order = new Order();
        $order->user_id = $user->id;
        $order->address = $request->address;
        $order->total = $cartItems->sum('price');
        $order->status = 'Pending';
        $order->save();

        // Clear the cart after checkout
        Cart::where('user_id', $user->id)->delete();

        return response()->json(['message' => 'Order placed successfully!', 'order_id' => $order->id], 201);
    }
}
