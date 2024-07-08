<?php

namespace App\Http\Controllers\Api;

use App\Models\Url;
use Illuminate\Support\Str;
use App\Services\UrlService;
use App\Http\Resources\UrlResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\EncodeUrlRequest;
use App\Http\Requests\DecodeUrlRequest;

class ShortenController extends Controller
{
    public function __construct(private UrlService $urlService)
    {
    }

    public function encode(EncodeUrlRequest $request): UrlResource
    {
        $uniqueShort = $this->urlService->generateUniqueUrl();
        $url = Url::create([
            'long_url'  => $request->input('url'),
            'short_url' => $uniqueShort,
        ]);

        return new UrlResource($url);
    }

    public function decode(DecodeUrlRequest $request): UrlResource
    {
        $short = Str::substr($request->input('url'), -6);
        $url = Url::query()
            ->where('short_url', $short)
            ->firstOrFail();

        return new UrlResource($url);
    }
}
