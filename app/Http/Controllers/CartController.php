<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Session;

class CartController extends Controller
{
    private $cart;
    function index()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $this->cart = Cart::with('products.product')->firstOrCreate(['user_id', $user->id])->first();
        } else {
            $user_id = session()->getId();
            $session = Session::where('id', $user_id)->first();
            $this->cart = Cart::with('products.product')->firstOrCreate(['session_id' => $user_id]);
        }
        return view('cart.index', ['cart' => $this->cart]);
    }
    public function addProduct(Product $product)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Logic for authenticated user (store in the database)
            $user = auth()->user();
            // Add product to the user's cart in the database
            $this->cart = Cart::with('products.product')->firstOrCreate(['user_id' => $user->id]);
        } else {
            // Logic for guest user (store in the session)
            $user_id = session()->getId();
            $this->cart = Cart::with('products.product')->firstOrCreate(['session_id' => $user_id]);
        }
        if (
            $this->cart->products->contains(function ($value, $key) use ($product) {
                return $value->product_id == $product->id;
            })
        ) {
            CartItem::where('product_id', $product->id)->where('cart_id', $this->cart->id)->first()->increment('quantity');
        } else {
            CartItem::create([
                'cart_id' => $this->cart->id,
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }
        return redirect()->route('cart.index');
    }
    public function removeProduct(Product $product)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            $this->cart = Cart::where(['user_id' => auth()->user()->id])->first();
        } else {
            // Logic for guest user (store in the session)
            $user_id = session()->getId();
            $this->cart = Cart::with('products.product')->firstOrCreate(['session_id' => $user_id]);
        }
        CartItem::where('product_id', $product->id)->where('cart_id', $this->cart->id)->first()->delete();

        return redirect()->route(route: 'cart.index');
    }

    function clearCart()
    {
        return redirect()->route('cart.index');
    }
}
