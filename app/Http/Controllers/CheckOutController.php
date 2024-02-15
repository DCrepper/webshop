<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    private Cart $cart;

    public function index()
    {
        return view('checkout.index');
    }

    public function store(Request $request)
    {
        $this->createCart();
        $this->cart->update([
            'status' => 'paid',
        ]);

        return redirect()->route('checkout.index');
    }
}
