<?php
// File: routes/web.php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Homepage routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.alt');

// Static pages routes
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/kegiatan', [HomeController::class, 'activities'])->name('activities');
Route::get('/bergabung', [HomeController::class, 'join'])->name('join');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

// Additional routes for future development
// Route::get('/berita', [NewsController::class, 'index'])->name('news');
// Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');
// Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery');
// Route::post('/pendaftaran', [RegistrationController::class, 'store'])->name('registration.store');