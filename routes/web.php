<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LinkController;

// index route
Route::get('/', function () {
    return view('welcome');
});

// Route for downloads
Route::get('/download/{filename}', [DownloadController::class, 'download'])->name('download.file');

Route::get('/uploads/{id}', function ($id) {
    // Du kan udføre eventuelle nødvendige handlinger her, hvis nødvendigt
    // ...

    // Omdiriger brugeren til welcome.blade.php
    return view('welcome');
});