<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get cart items for the user
        $cartItems = Cart::where('user_id', $user->id)->with('menuItem')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->withErrors('Your cart is empty.');
        }

        // Create a new order
        $order = new Order();
        $order->user_id = $user->id;
        $order->total_price = $cartItems->sum(function ($cart) {
            return $cart->menuItem->price * $cart->quantity;
        });
        $order->save();

        // Attach order items
        foreach ($cartItems as $cartItem) {
            $order->orderItems()->attach($cartItem->menu_item_id, [
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->menuItem->price,
            ]);
        }

        // Clear the user's cart after checkout
        Cart::where('user_id', $user->id)->delete();

        return view('order_confirmation', ['order' => $order]);
    }
}
