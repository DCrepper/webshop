<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CheckOutController extends Controller
{
    private Cart $cart;

    public function index()
    {
        $this->cart = CartController::createCart();

        return view('checkout.index', ['cart' => $this->cart]);
    }
}
