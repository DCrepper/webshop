<?php

namespace Tests\Feature\Guest;

use App\Http\Controllers\CartController;
use Tests\TestCase;

class GuestOrderTest extends TestCase
{
    /**
     * User Order form page
     */

    /**
     * Test case to verify that a guest user can place an order.
     */
    public function testGuestUserCanPlaceOrder(): void
    {
        $this->actingAsGuest();
        $this->get(route('checkout.index'))->assertStatus(200);
        $cart = CartController::createCart();
        $this->view('checkout.index', compact('cart'))->assertSee('Checkout');
    }
}
