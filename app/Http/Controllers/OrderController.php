<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentGateWay;
use Automattic\WooCommerce\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        if (! auth()->user()) {
            return redirect()->route('login');
        }
        $orders = auth()->user()->orders;

        return view('orders.index', compact('orders'));
    }

    public function update(Request $request): Response
    {
        $request = json_decode(request()->getContent(), true);
        $order = Order::firstOrCreate(['order_id' => $request['id']]);
        $order->update(
            [
                'order_id' => $request['id'],
                'order_status' => $request['status'],
            ]
        );

        return response('');
    }

    public function store(OrderCreateRequest $request)
    {
        //validation
        $validated = $request->validated();
        $client = new Client(
            config('app.wordpress_wc_baseurl'),
            config('app.woocommerce_api_key'),
            config('app.woocommerce_api_secret_key'),
            [
                'version' => 'wc/v3',
            ]
        );
        $user_id = null;
        if (Auth::check()) {
            $user_id = auth()->user()->id;
        }

        $cartItems = CartController::getCartItems()->map(function ($item) {
            return [
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
            ];
        });
        $payment_method = PaymentGateWay::where('payment_gate_way_id', $validated['payment_method'])->first();
        $data = [
            'payment_method' => $payment_method->payment_method_id,
            'payment_method_title' => $payment_method->title,
            'set_paid' => false,
            'billing' => [
                'first_name' => $validated['billing']['first_name'],
                'last_name' => $validated['billing']['last_name'],
                'address_1' => $validated['billing']['address_1'],
                'address_2' => $validated['billing']['address_2'] ?? '',
                'city' => $validated['billing']['city'],
                'state' => $validated['billing']['state'],
                'postcode' => $validated['billing']['postcode'],
                'country' => $validated['billing']['country'],
                'email' => $validated['billing']['email'],
                'phone' => $validated['billing']['phone'],
            ],
            'shipping' => [
                'first_name' => $validated['shipping']['first_name'],
                'last_name' => $validated['shipping']['last_name'],
                'address_1' => $validated['shipping']['address_1'],
                'address_2' => $validated['shipping']['address_2'] ?? '',
                'city' => $validated['shipping']['city'],
                'state' => $validated['shipping']['state'],
                'postcode' => $validated['shipping']['postcode'],
                'country' => $validated['shipping']['country'],
            ],
            'line_items' => $cartItems->toArray(),
            'shipping_lines' => [
                [
                    'method_id' => $validated['shipping_lines'],
                    'method_title' => 'Flat Rate',
                    'total' => '10.00',
                ],
            ],
        ];
        //create order in woocommerce

        $order = $client->post('orders', $data);

        //transaction to create order in our db
        DB::beginTransaction();
        try {
            $created_order = Order::create([
                'user_id' => $user_id,
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

            //clear cart
            CartController::clearCartItems();

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
            //end transaction
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }

        //TODO: Email to user about order

        if (auth()->check()) {
            return redirect()->route('order.myOrders')->with('success', 'Order created successfully');
        }

        return redirect()->route('order.thankyou')->with('success', 'Order created successfully');
    }

    public function myOrders(): View
    {
        $orders = auth()->user()->orders;

        return view('order.list', compact('orders'));
    }

    public function show(Order $order)
    {
        $order = Order::find($order->id)->with('order_items')->first();

        return view('order.show', compact('order'));
    }

    public function thankYou(Request $request): View
    {
        return view('order.thankyou');
    }
}
