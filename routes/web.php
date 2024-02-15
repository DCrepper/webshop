<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');

Route::name('cart.')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('index');
    Route::post('/cart/add/{product}', [CartController::class, 'addProduct'])->name('add');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('clear');
    Route::delete('/cart/remove/{product}', [CartController::class, 'removeProduct'])->name('remove');
});

Route::view('/', 'index');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
