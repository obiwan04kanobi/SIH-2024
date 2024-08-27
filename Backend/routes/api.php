<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NotificationController;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentUploadController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Notifications
Route::get('/notifications', [NotificationController::class, 'index']);
Route::post('/notifications', [NotificationController::class, 'store']);

// About Schemes
Route::get('/schemes', [SchemeController::class, 'index']);
Route::post('/schemes', [SchemeController::class, 'store']);


// Auth Routes
Route::group(['middleware' => ['web']], function () {
    Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp');
});

// Document upload to s3

// Route::post('/upload-document', [DocumentUploadController::class, 'uploadDocument'])->middleware('auth');
Route::post('/upload-document', [DocumentUploadController::class, 'uploadDocument']);

