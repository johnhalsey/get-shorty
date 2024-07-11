<?php

use Illuminate\Support\Facades\Route;

Route::post('encode', [App\Http\Controllers\Api\ShortenController::class, 'encode']);
Route::get('decode', [App\Http\Controllers\Api\ShortenController::class, 'decode']);
