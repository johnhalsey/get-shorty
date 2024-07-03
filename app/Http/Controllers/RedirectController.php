<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect(Request $request, $short_url): \Illuminate\Http\RedirectResponse
    {
        $url = Url::where('short_url', $short_url)
            ->firstOrFail();

        return redirect($url->long_url);
    }
}
