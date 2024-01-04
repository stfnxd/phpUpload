<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;

// index route
Route::get('/', function () {
    return view('welcome');
});

// Route for downloads
Route::get('/download/{filename}', [DownloadController::class, 'download'])->name('download.file');
