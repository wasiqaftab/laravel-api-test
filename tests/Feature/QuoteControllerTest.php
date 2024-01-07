<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuoteControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function it_can_get_quotes()
    {
        $this->get('/quotes')
            ->assertStatus(200)
            ->assertJsonStructure(['quotes']);
    }

    public function it_can_refresh_quotes()
    {
        $this->get('/quotes/refresh')
            ->assertStatus(200)
            ->assertJsonStructure(['quotes']);
    }
}
