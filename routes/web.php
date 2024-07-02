<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/{short_url}', [App\Http\Controllers\RedirectController::class, 'redirect']);
