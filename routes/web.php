<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/', [ProductController::class, 'index'])->name('products');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'addProduct'])->name('cart.add');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::delete('/cart/remove/{product}', [CartController::class, 'removeProduct'])->name('cart.remove');

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
