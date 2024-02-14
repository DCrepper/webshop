<?php

namespace Tests\Feature\Guest;

use Tests\TestCase;

class GuestOrderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGuestCanOrder(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
