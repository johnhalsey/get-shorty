<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EncodeUrlRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_url_is_required()
    {
        $this->postJson('/api/encode', [
            'url' => ''
        ])->assertStatus(422)
            ->assertJsonValidationErrors('url')
            ->assertJsonFragment([
                'url' => ['The url field is required.']
            ]);
    }

    public function test_url_must_be_valid_url()
    {
        $this->postJson('/api/encode', [
            'url' => 123
        ])->assertStatus(422)
            ->assertJsonValidationErrors('url')
            ->assertJsonFragment([
                'url' => ['The url field must be a valid URL.']
            ]);
    }
}
