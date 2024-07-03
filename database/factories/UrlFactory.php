<?php

namespace Database\Factories;

use App\Services\UrlService;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $service = App::make(UrlService::class);

        return [
            'long_url' => $this->faker->url,
            'short_url' => $service->generateUniqueUrl(),
        ];
    }
}
