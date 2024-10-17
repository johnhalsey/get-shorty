<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_anon_can_get_to_the_home_encode_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('encode');
    }

    public function test_anon_can_get_to_the_decode_page(): void
    {
        $response = $this->get('/decode/url');

        $response->assertStatus(200)
            ->assertViewIs('decode');
    }


}
