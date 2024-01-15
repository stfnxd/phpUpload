<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LoginController;
use App\Http\Livewire\Login;
// index route
Route::get('/', function () {
    return view('welcome');
});

// Route for downloads
Route::get('/download/{filename}', [DownloadController::class, 'download'])->name('download.file');

Route::middleware(['uploads.auth'])->group(function () {
    Route::get('/uploads/{id}', function ($id) {
        // Håndter visning af uploads-siden baseret på $id
        // ...

        return view('welcome');
    });
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [Login::class, 'loginForm']);