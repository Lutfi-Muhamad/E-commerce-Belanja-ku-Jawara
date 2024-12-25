<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\CartController;

// Halaman utama
Route::get('/', function () {
    return view(view: 'index');
});

// Login
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AdminController::class, 'login'])->name('login');


// Register
Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AdminController::class, 'register'])->name('register');

// Forgot Password (kombinasi dengan reset password)
Route::get('/forgot-password', [AdminController::class, 'showForgotPasswordForm'])->name('password.request');
// Menangani pengiriman email reset dan proses reset password
Route::post('/forgot-password/send', [AdminController::class, 'sendResetEmail'])->name('password.sendEmail');
Route::post('/forgot-password/reset', [AdminController::class, 'resetPassword'])->name('password.resetPassword');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login.form'); // Arahkan ke halaman login
})->name('logout');

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

// Rekan saya
Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

Route::group(['middleware' => ['auth:admin']], function () {
    // Route untuk halaman produk dan CRUD-nya

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::resource('products', ProductController::class);
});

// Rute untuk menampilkan produk di halaman index tanpa harus login
Route::get('/index', [ProductController::class, 'indexuser'])->name(name: 'produk.index');

Route::middleware('auth')->group(function () {
    // Rute untuk halaman produk

    // Rute untuk keranjang
    Route::get('/keranjang', [CartController::class, 'showCart'])->name('cart.index');
    Route::post('/keranjang/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/keranjang/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::get('/keranjang/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/keranjang/clear', [CartController::class, 'clearCart'])->name('cart.clear');
});

Route::get('/produk', [ProductController::class, 'indexuser'])->name('TampilanDashboard.index');