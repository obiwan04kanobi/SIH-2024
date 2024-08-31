<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');  // Add a name for the root route

Route::get('about', function () {
    return view('about');
})->name('about');  // Add a name for the root route

Route::get('contact', function () {
    return view('contact');
})->name('contact');  // Add a name for the root route

Route::get('dash', function () {
    return view('dashboard');
})->name('dash');  // Add a name for the root route

Route::get('apply', function () {
    return view('form');
})->name('form');  // Add a name for the root route

Route::get('upload', function () {
    return view('upload');
})->name('upload');  // No authentication required


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
