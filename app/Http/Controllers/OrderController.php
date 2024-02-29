<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Request;

class OrderController extends Controller
{
    public Cart $cart;

    /**
     * Helper
     */
    public Client $client;

    public function index()
    {
        if (! auth()->user()) {
            return redirect()->route('login');
        }
        $orders = auth()->user()->orders;

        return view('orders.index', compact('orders'));
    }

    public function update(Request $request)
    {
        Log::debug('info', $request->all());
        //$order = Order::find($order->id);
        //$order->update($request->all());

        //return redirect()->route('order.show', ['order' => $order->id]);
        return response()->json(['success' => 'Order updated successfully']);
    }

    public function store(OrderCreateRequest $request)
    {
        //validation
        $validated = $request->validated();
        $this->client = new Client(
            config('app.wordpress_wc_baseurl'),
            config('app.woocommerce_api_key'),
            config('app.woocommerce_api_secret_key'),
            [
                'version' => 'wc/v3',
            ]
        );

        $this->cart = CartController::createCart();
        $cartItems = CartController::getCartItems()->map(function ($item) {
            return [
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
            ];
        });
        $data = [
            'payment_method' => 'bacs',
            'payment_method_title' => 'Direct Bank Transfer',
            'set_paid' => true,
            'billing' => [
                'first_name' => $validated['billing']['first_name'],
                'last_name' => $validated['billing']['last_name'],
                'address_1' => $validated['billing']['address_1'],
                'address_2' => $validated['billing']['address_2'],
                'city' => $validated['billing']['city'],
                'state' => $validated['billing']['state'],
                'postcode' => $validated['billing']['postcode'],
                'country' => $validated['billing']['country'],
                'email' => $validated['billing']['email'],
                'phone' => $validated['billing']['phone'],
                'postcode' => $validated['billing']['postcode'],
                'country' => $validated['billing']['country'],
                'email' => $validated['billing']['email'],
                'phone' => $validated['billing']['phone'],
            ],
            'shipping' => [
                'first_name' => $validated['shipping']['first_name'],
                'last_name' => $validated['shipping']['last_name'],
                'address_1' => $validated['shipping']['address_1'],
                'address_2' => $validated['shipping']['address_2'],
                'city' => $validated['shipping']['city'],
                'state' => $validated['shipping']['state'],
                'postcode' => $validated['shipping']['postcode'],
                'country' => $validated['shipping']['country'],
            ],
            'line_items' => $cartItems->toArray(),
            'shipping_lines' => [
                [
                    'method_id' => $validated['shipping']['lines_method'],
                    'method_title' => 'Flat Rate',
                    'total' => '10.00',
                ],
            ],
        ];
        $order = $this->client->post('orders', $data);
        DB::beginTransaction();
        try {
            $created_order = Order::create([
                'payment_method' => $order->payment_method,
                'payment_method_title' => $order->payment_method_title,
                'set_paid' => true,
                'billing_first_name' => $order->billing->first_name,
                'billing_last_name' => $order->billing->last_name,
                'billing_address_1' => $order->billing->address_1,
                'billing_address_2' => $order->billing->address_2,
                'billing_city' => $order->billing->city,
                'billing_state' => $order->billing->state,
                'billing_postcode' => $order->billing->postcode,
                'billing_country' => $order->billing->country,
                'billing_email' => $order->billing->email,
                'billing_phone' => $order->billing->phone,
                'shipping_first_name' => $order->shipping->first_name,
                'shipping_last_name' => $order->shipping->last_name,
                'shipping_address_1' => $order->shipping->address_1,
                'shipping_address_2' => $order->shipping->address_2,
                'shipping_city' => $order->shipping->city,
                'shipping_state' => $order->shipping->state,
                'shipping_postcode' => $order->shipping->postcode,
                'shipping_country' => $order->shipping->country,
                'shipping_tracking_number' => $order->number,
                'shipping_lines_method_id' => $order->shipping_lines[0]->method_id,
                'shipping_lines_method_title' => $order->shipping_lines[0]->method_title,
                'shipping_lines_total' => $order->shipping_lines[0]->total,
                'order_id' => $order->id,
                'order_key' => $order->order_key,
                'order_status' => $order->status,
                'order_currency' => $order->currency,
            ]);

            foreach (CartController::getCartItems() as $product) {
                CartItem::where('cart_id', $this->cart->id)->where('product_id', $product->product_id)->first()->delete();
            }

            foreach ($order->line_items as $item) {
                OrderItem::create([
                    'order_id' => $created_order->id,
                    'product_id' => $item->product_id,
                    'tax_class' => $item->tax_class,
                    'subtotal' => $item->product_id,
                    'subtotal_tax' => $item->product_id,
                    'total' => $item->product_id,
                    'total_tax' => $item->product_id,
                    'quantity' => $item->quantity,
                ]);
            }
            DB::commit();
        } catch (\Exception $e) {
            session()->flash('error', __($e->getMessage()));
            DB::rollBack();
            Log::debug($e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }
        if (auth()->user()) {
            return redirect()->route('order.myOrders')->with('success', 'Order created successfully');
        }

        return redirect()->route('order.show', ['order_id' => $created_order->id])->with('success', 'Order created successfully');
    }

    public function myOrders(Request $request)
    {
        //$orders = auth()->user()->orders;

        return view('order.list');
    }

    public function show(Order $order)
    {
        $order = Order::find($order->id)->with('order_items')->first();

        return view('order.show', compact('order'));
    }
}
