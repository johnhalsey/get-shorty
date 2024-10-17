<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Models\Url;
use App\Services\UrlService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_will_generate_a_unique_short_url()
    {
        $urlService = new UrlService();

        $shortUrls = [];
        for ($i = 0; $i < 100; $i++) {
            $shortUrls[] = $urlService->generateUniqueUrl(Url::DEFAULT_LENGTH);
        }
        // assert all the short urls are unique
        $this->assertEquals(count($shortUrls), count(array_unique($shortUrls)));
    }
}
