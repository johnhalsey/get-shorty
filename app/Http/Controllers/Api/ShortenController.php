<?php

namespace App\Http\Controllers\Api;

use App\Models\Url;
use App\Services\UrlService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\EncodeUrlRequest;
use App\Http\Requests\DecodeUrlRequest;

class ShortenController extends Controller
{
    public function __construct(private UrlService $urlService)
    {
    }

    public function encode(EncodeUrlRequest $request): JsonResponse
    {
        $url = $this->urlService->generateUniqueUrl();
        Url::create([
            'long_url' => $request->input('url'),
            'short_url' => $url
        ]);

        return response()->json([
            'short_url' => $url
        ]);
    }

    public function decode(DecodeUrlRequest $request): JsonResponse
    {
        $url = Url::where('short_url', $request->input('short_url'))
            ->firstOrFail();

        return response()->json([
            'long_url' => $url->long_url
        ]);
    }
}
