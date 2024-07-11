<?php

namespace App\Services;

use App\Models\Url;
use Illuminate\Support\Str;

class UrlService
{


    public function generateUniqueUrl(int $length): string
    {
        $url = Str::lower(Str::random($length));
        if (Url::where('short_url', $url)->exists()) {
            return $this->generateUniqueUrl();
        }
        return $url;
    }
}
