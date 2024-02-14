<?php

namespace Tests\Feature\User;

use App\Models\Product;
use Tests\TestCase;

class UserCartTest extends TestCase
{
    public function testGuestAddProduct()
    {
        // Create a product
        // acting as unauthenticated user
        $this->actingAsGuest();
        $this->assertGuest();
        $product = Product::factory(1)->create();
        $product = Product::whereId($product[0]->id)->first();
        // Add the product to the cart
        $response = $this->post('/cart/add', $product->toArray());
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
        $response = $this->post('/cart/add', $product->toArray());
        // Remove the product from the cart
        $response = $this->delete('/cart/remove', $product->toArray());
        // Assert that the product was successfully removed
    }

}
