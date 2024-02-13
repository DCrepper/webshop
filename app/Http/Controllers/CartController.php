<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index()
    {
        $cart = [];
        if (auth()->check()) {
            $user = auth()->user();
            $cart = Cart::where('user_id', $user->id)->get();
        } else {
            $cart = session()->get('cart');
            $cart = collect($cart)->map(function ($cart) {
                $cart['product'] = Product::where('id', $cart['product_id'])->first();
                return (object) $cart;
            });
        }
        return view('cart.index', compact('cart'));
    }
    public function addProduct(Product $product)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Logic for authenticated user (store in the database)
            $user = auth()->user();
            // Add product to the user's cart in the database
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        } else {
            // Logic for guest user (store in the session)
            $cart = session()->get('cart');
            $cart[(string) $product->id] =
                [
                    'product_id' => $product->id,
                    'quantity' => 1,
                ];
            session(['cart' => $cart]);
        }
        return redirect('cart');
    }
    function clearCart()
    {
        if (auth()->check()) {
            $user = auth()->user();
            Cart::where('user_id', $user->id)->delete();
        } else {
            session()->forget('cart');
        }
        return redirect('cart');
    }
}
