<?php

namespace Tests\Feature\Api;

use App\Models\Url;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShortenControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_anon_can_shorten_a_long_url()
    {
        $longUrl = 'https://www.batmanandrobin.com/this-is-a-long-url-that-needs-to-be-shortened?bulter-alfred';

        $response = $this->postJson('/api/encode', [
            'url' => $longUrl
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'long_url' => $longUrl
            ]);

        $jsonData = json_decode($response->getContent(), true)['data'];

        $this->assertDatabaseCount('urls', 1);

        $url = Url::first();
        $this->assertSame(url($url->short_url), $jsonData['short_url']);
    }

    public function test_anon_can_get_original_long_url()
    {
        $longUrl = 'https://www.batmanandrobin.com/this-is-a-long-url-that-needs-to-be-shortened?bulter-alfred';

        $url = Url::factory()->create([
            'long_url' => $longUrl
        ]);

        $response = $this->json(
            'GET',
            '/api/decode', [
            'url' => url($url->short_url)
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'long_url'  => $longUrl,
                'short_url' => url($url->short_url)
            ]);
    }
}
