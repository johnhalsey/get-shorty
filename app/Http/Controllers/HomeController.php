<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('EncodePage');
    }

    public function decode()
    {
        return Inertia::render('DecodePage');
    }
}
