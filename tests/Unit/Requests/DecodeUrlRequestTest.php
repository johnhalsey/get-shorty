<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;

class DecodeUrlRequestTest extends TestCase
{
    /** @test */
    public function url_is_required()
    {
        $this->postJson('/api/decode', [
            'url' => ''
        ])->assertStatus(422)
            ->assertJsonValidationErrors('url')
            ->assertJsonFragment([
                'url' => ['The url field is required.']
            ]);
    }

    /** @test */
    public function url_must_be_valid()
    {
        $this->postJson('/api/decode', [
            'url' => 'fsdfsdfsdf'
        ])->assertStatus(422)
            ->assertJsonValidationErrors('url')
            ->assertJsonFragment([
                'url' => ['The url field must be a valid URL.']
            ]);
    }

    /** @test */
    public function url_must_not_be_longer_than_255()
    {
        $this->postJson('/api/decode', [
            'url' => 'https://www.batmanandrobinandbrucestuff.com/na-na-na-na-na-na-na-na/na-na-na-na-na-na-na-na/this-is-a-long-url-that-needs-to-be-shortened/batman/na-na-na-na-na-na-na-na/na-na-na-na-na-na-na-na/na-na-na-na-na-na-na-na/na-na-na-na-na-na-na-na?bulter=alfred&home=cave'
        ])->assertStatus(422)
            ->assertJsonValidationErrors('url')
            ->assertJsonFragment([
                'url' => ['The url field must not be greater than 255 characters.']
            ]);
    }


}
