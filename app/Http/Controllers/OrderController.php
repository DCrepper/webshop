<?php

namespace App\Http\Controllers;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = auth()->user()->orders;

        return view('orders.index', compact('orders'));
    }
}
