<?php

use App\Http\Controllers\SocialLoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback']);
Route::get('/auth/{provider}', [SocialLoginController::class, 'redirectToProvider'])->name('social.redirect');
