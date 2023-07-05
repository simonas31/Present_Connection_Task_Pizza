<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * Get main page test
     */
    public function test_get_main_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Get orders page test
     */
    public function test_get_orders_page(): void
    {
        $response = $this->get('/api/orders');

        $response->assertStatus(200);
    }


    /**
     * Post pizza order test
     */
    public function test_post_pizza_order(): void
    {
        $response = $this->post('/api/', [
            'size' => 'Small',
            'toppings' => []
        ]);

        $response->assertStatus(200);
    }
}
