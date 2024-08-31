<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentUploadController;
use App\Http\Controllers\ValidateDocumentController;
use App\Http\Controllers\TestFetchController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/upload-document', [DocumentUploadController::class, 'uploadDocument']);  // No authentication required

// Define the API route for fetching document data
Route::get('/fetch-document', [ValidateDocumentController::class, 'fetchDocument']);


// In routes/api.php
Route::get('/test-fetch', [TestFetchController::class, 'fetchJsonFile']);

