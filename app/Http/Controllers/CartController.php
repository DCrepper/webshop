<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index()
    {
        $cart = [];
        if (auth()->check()) {
            $user = auth()->user();
            $cart = Cart::with('products.product')->where('user_id', $user->id)->first();
        } else {
            $user_id = session()->getId();
            $session = Session::where('id', $user_id)->first();
            $cart = Cart::with('products.product')->firstOrCreate(['session_id' => $user_id]);
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
            $cart = Cart::with('products.product')->firstOrCreate(['user_id' => $user->id]);
            if ($cart->products->contains($product)) {
                $cart->products()->updateExistingPivot($product->id, ['quantity' => 1]);
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => 1
                ]);
            }
        } else {
            // Logic for guest user (store in the session)
            $user_id = session()->getId();
            $cart = Cart::with('products.product')->firstOrCreate(['session_id' => $user_id]);
            if ($cart->products->contains($product)) {
                $cart->products()->updateExistingPivot($product->id, ['quantity' => 1]);
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => 1
                ]);
            }

        }
        return redirect('cart');
    }
    public function removeProduct(Product $product)
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Logic for authenticated user (remove from the database)
            $user = auth()->user();
            Cart::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->delete();
        } else {
            // Logic for guest user (remove from the session)
            $cart = session()->get('cart');
            unset($cart[(string) $product->id]);
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
