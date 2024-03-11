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
Route::prefix('product')->as('product.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
});
Route::prefix('cart')->as('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add/{product}', [CartController::class, 'addProduct'])->name('add');
    Route::get('/clear', [CartController::class, 'clearCartItems'])->name('clear');
    Route::delete('/remove/{product}', [CartController::class, 'removeProduct'])->name('remove');
});

Route::prefix('order')->as('order.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
    Route::get('/show/{order}', [OrderController::class, 'show'])->name('show');
    Route::middleware('auth')->group(function () {
        Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('myOrders');
    });
    Route::get('/thank-you', [OrderController::class, 'thankYou'])->name('thankyou');
});

Route::prefix('checkout')->as('checkout.')->group(function () {
    Route::get('/', [CheckOutController::class, 'index'])->name('index');
});
//Route::view('/', 'index')->name('index');

Route::get('/', [\App\Http\Controllers\PageDisplayController::class, 'home'])->name('frontend.home');
Route::get('{slug}', [\App\Http\Controllers\PageDisplayController::class, 'show'])->name('frontend.page');
