<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiCartController extends Controller
{
    public function addToCart(Request $request)
{
    try {
        $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $cart = Cart::updateOrCreate(
            [
                'user_id' => $userId,
                'menu_item_id' => $request->menu_item_id,
            ],
            [
                'quantity' => $request->quantity,
            ]
        );

        return response()->json(['message' => 'Added to cart successfully', 'cart' => $cart]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Something went wrong', 'details' => $e->getMessage()], 500);
    }
}

    public function getCart()
    {
        $cartItems = Cart::with('menuItem')->where('user_id', Auth::id())->get();
        return response()->json($cartItems);
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();
        
        return response()->json(['message' => 'Removed from cart']);
    }
}
