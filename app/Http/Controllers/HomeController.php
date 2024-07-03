<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('encode');
    }

    public function decode()
    {
        return view('decode');
    }
}
