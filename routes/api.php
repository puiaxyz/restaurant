<?php

use App\Http\Controllers\Api\MenuItemController;
use App\Http\Controllers\Api\ApiCartController; // Updated this line
use App\Http\Controllers\Api\ApiOrderHistoryController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::get('/order-history', [ApiOrderHistoryController::class, 'index']);
    Route::post('/checkout', [CheckoutController::class, 'checkout']);
    Route::post('/cart', [ApiCartController::class, 'addToCart']); // Updated this line
    Route::get('/cart', [ApiCartController::class, 'getCart']); // Updated this line
    Route::delete('/cart/{id}', [ApiCartController::class, 'removeFromCart']); // Updated this line
});

// Public Routes
Route::get('/menu-items', [MenuItemController::class, 'index']);
Route::post('/login', [LoginController::class, 'loginApi'])->name('api.login');
