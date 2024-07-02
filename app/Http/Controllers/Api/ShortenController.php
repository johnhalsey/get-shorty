<?php

namespace App\Http\Controllers\Api;

use App\Models\Url;
use App\Services\UrlService;
use App\Http\Resources\UrlResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
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
            'long_url' => Crypt::encrypt($request->input('url')),
            'short_url' => $uniqueShort
        ]);

        return new UrlResource($url);
    }

    public function decode(DecodeUrlRequest $request): UrlResource
    {
        $url = Url::where('short_url', $request->input('short_url'))
            ->firstOrFail();

        return new UrlResource($url);
    }
}
