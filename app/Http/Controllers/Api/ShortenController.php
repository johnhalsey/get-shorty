<?php

namespace App\Http\Controllers\Api;

use App\Models\Url;
use Illuminate\Support\Str;
use App\Services\UrlService;
use App\Http\Resources\UrlResource;
use Illuminate\Support\Facades\Log;
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
        Log::info($request->input('url'));
        Log::info(url());
        $short = Str::after($request->input('url'), url());
        Log::info($short);
//        $url = Url::where('short_url', $short)
//            ->firstOrFail();

//        return new UrlResource($url);
    }
}
