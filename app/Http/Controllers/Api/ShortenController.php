<?php

namespace App\Http\Controllers\Api;

use App\Models\Url;
use Illuminate\Support\Str;
use App\Services\UrlService;
use Illuminate\Http\Request;
use App\Http\Resources\UrlResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\EncodeUrlRequest;

class ShortenController extends Controller
{
    public function __construct(private UrlService $urlService)
    {
    }

    public function encode(EncodeUrlRequest $request): UrlResource
    {
        $uniqueShort = $this->urlService->generateUniqueUrl(Url::DEFAULT_LENGTH);
        $url = Url::create([
            'long_url'  => $request->input('url'),
            'short_url' => $uniqueShort,
        ]);

        return new UrlResource($url);
    }

    public function decode(Request $request): UrlResource
    {
        $short = Str::trim(Str::after($request->get('url'), url('') . '/'));
        $url = Url::query()
            ->where('short_url', $short)
            ->firstOrFail();

        return new UrlResource($url);
    }
}
