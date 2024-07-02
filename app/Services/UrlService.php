<?php

namespace App\Services;

use App\Models\Url;
use Illuminate\Support\Str;

class UrlService
{
    public function generateUniqueUrl($length = 6): string
    {
        $url = Str::lower(substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length));
        if (Url::where('short_url', $url)->exists()) {
            return $this->generateUniqueUrl();
        }
        return $url;
    }
}
