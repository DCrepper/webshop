<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class CartController extends Controller
{
    private Cart $cart;

    public function index()
    {
        $this->createCart();

        return view('cart.index', ['cart' => $this->cart]);
    }

    public function addProduct(Product $product)
    {
        $this->createCart();
        if (
            $this->getCartItems()->contains(function ($value, $key) use ($product) {
                return $value->product_id == $product->id;
            })
        ) {
            CartItem::where('product_id', $product->id)->where('cart_id', $this->cart->id)->first()->increment('quantity');

            return redirect()->route('cart.index');
        }

        CartItem::create([
            'cart_id' => $this->cart->id,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);

        return redirect()->route('cart.index');
    }

    public function removeProduct(Product $product)
    {
        $this->createCart();
        CartItem::where('product_id', $product->id)->where('cart_id', $this->cart->id)->first()->delete();

        return redirect()->route(route: 'cart.index');
    }

    public function clearCart()
    {
        $this->createCart();

        return redirect()->route('cart.index');
    }

    private function getCartItems(): Collection
    {
        $this->createCart();

        return $this->cart->products;
    }

    public function getCartTotal()
    {
        $this->createCart();

        return $this->getCartItems()->sum(function ($cartItem) {
            return $cartItem->product->price * $cartItem->quantity;
        });
    }

    /**
     * Retrieves the count of items in the cart.
     *
     * @return int The number of items in the cart.
     */
    public function getCartCount(): int
    {
        $this->createCart();

        return $this->getCartItems()->count();
    }

    public function checkout()
    {
        $this->createCart();
        $cart = $this->getCart();
        $cart->update(['checked_out' => true]);

        return redirect()->route('cart.index');
    }

    public function updateQuantity(Product $product, int $quantity)
    {
        $this->createCart();
        if ($quantity < 1) {
            return redirect()->route('cart.index')->with('error', __('Quantity cannot be less than 1'));
        }
        CartItem::where('product_id', $product->id)->where('cart_id', $this->cart->id)->first()->update(['quantity' => $quantity]);

        return redirect()->route('cart.index');
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
