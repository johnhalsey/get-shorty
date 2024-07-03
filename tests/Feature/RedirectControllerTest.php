<?php

namespace Tests\Feature;

use App\Models\Url;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RedirectControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anon_will_get_redirected_to_original_long_url()
    {
        $url = Url::factory()->create();

        $this->call('GET',
            '/' . $url->short_url
        )
            ->assertStatus(302)
            ->assertRedirect($url->long_url);
    }
}
