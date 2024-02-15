<?php

namespace Tests\Feature\Guest;

use App\Models\Product;
use Tests\TestCase;

class GuestCartTest extends TestCase
{
    public function testGuestIsLoggedOut()
    {
        $this->assertGuest();
    }

    public function testGuestAddProduct()
    {

        // acting as unauthenticated user
        $this->actingAsGuest();
        $this->assertGuest();
        // Create a product
        $product = Product::factory(1)->create();
        $product = Product::whereId($product[0]->id)->first();
        // Add the product to the cart
        $response = $this->post(route('cart.add', ['product' => $product]));
        $response->assertRedirectToRoute('cart.index');
        $cart = collect(session()->get('cart'));
        dd(session());
        dd(session()->get('cart'));

        $response->assertSessionHasNoErrors();
        // Assert that the product was successfully added
    }

    public function testGuestRemoveProduct()
    {
        // Create a product
        // acting as unauthenticated user
        $this->actingAsGuest();
        $this->assertGuest();
        $product = Product::factory(1)->create();
        $product = Product::whereId($product[0]->id)->first();
        // Add the product to the cart
        $response = $this->post(route('cart.add', ['product' => $product]));
        $response->assertStatus(302);
        // Remove the product from the cart
        $response = $this->delete(route('cart.remove', ['product' => $product]));
        $response->assertStatus(302);
        // Assert that the product was successfully removed

    }
}
