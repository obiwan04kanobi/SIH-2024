<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticated;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('sign-in');
})->name('loginForm');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('sign-up');
})->name('register');

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/dash', function () {
    return view('dashboard');
});

Route::get('/apply', function () {
    return view('form');
});

Route::get('/test-session', function () {
    session(['key' => 'value']);
    return session('key'); // should return 'value'
});