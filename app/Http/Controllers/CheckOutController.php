<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CheckOutController extends Controller
{
    private Cart $cart;

    public function index()
    {
        $this->createCart();

        return view('checkout.index', ['cart' => $this->cart]);
    }

    /**
     * Creates a new or exist cart.
     */
    private function createCart(): void
    {
        if (auth()->check()) {
            $user = auth()->user();
            $this->cart = Cart::with('products.product')->firstOrCreate(['user_id', $user->id])->first();
        } else {
            $user_id = session()->getId();
            $this->cart = Cart::with('products.product')->firstOrCreate(['session_id' => $user_id]);
        }
    }
}
