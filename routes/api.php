<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\ProductController;

// Rute untuk Admin
Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/register', [AdminController::class, 'register']);
    Route::post('/send-reset-email', [AdminController::class, 'sendResetEmail']);
    Route::post('/reset-password', [AdminController::class, 'resetPassword']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::post('/logout', [AdminController::class, 'logout']);
    });
});

// Rute untuk Cart
Route::prefix('cart')->middleware('auth:sanctum')->group(function () {
    Route::post('/add/{id}', [CartController::class, 'addToCart']);
    Route::get('/show', [CartController::class, 'showCart']);
    Route::post('/update/{id}', [CartController::class, 'updateQuantity']);
    Route::delete('/remove/{id}', [CartController::class, 'removeFromCart']);
    Route::post('/checkout', [CartController::class, 'checkout']);
    Route::delete('/clear', [CartController::class, 'clearCart']);
});

// Rute untuk Produk
Route::prefix('products')->group(function () {
    Route::get('/admin', [ProductController::class, 'index']); // Semua produk untuk admin
    Route::get('/user', [ProductController::class, 'indexuser']); // Semua produk untuk user
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/store', [ProductController::class, 'store']); // Menambahkan produk baru
        Route::put('/update/{id}', [ProductController::class, 'update']); // Mengubah produk
    });
});