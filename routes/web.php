<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\OrderController;
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

Route::prefix('cart')->as('cart.')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('index');
    Route::post('/cart/add/{product}', [CartController::class, 'addProduct'])->name('add');
    Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('clear');
    Route::delete('/cart/remove/{product}', [CartController::class, 'removeProduct'])->name('remove');
});

Route::prefix('order')->as('order.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
    Route::get('/list', [OrderController::class, 'myOrders'])->name('myOrders');
    Route::post('/update', [OrderController::class, 'update'])->name('update');
});

Route::get('order/show/{order}', [OrderController::class, 'show'])->name('show');

Route::prefix('checkout')->as('checkout.')->group(function () {
    Route::get('/checkout', [CheckOutController::class, 'index'])->name('index');
});
Route::view('/', 'index');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
