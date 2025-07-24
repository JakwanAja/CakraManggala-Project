<?php
// File: routes/web.php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\PendaftarController;
use Illuminate\Support\Facades\Route;

// Homepage routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.alt');

// Static pages routes
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/kegiatan', [HomeController::class, 'activities'])->name('activities');
Route::get('/bergabung', [HomeController::class, 'join'])->name('join');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::get('/struktur-kepengurusan', [StrukturController::class, 'index'])->name('struktur-kepengurusan');

// Pendaftaran routes
Route::post('/bergabung', [HomeController::class, 'storePendaftaran'])->name('join.store');
Route::get('/bergabung/sukses/{id}', [HomeController::class, 'joinSuccess'])->name('join.success');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Data Pendaftar routes
    Route::get('/dashboard/pendaftar', [PendaftarController::class, 'index'])->name('dashboard.pendaftar');
    Route::get('/dashboard/pendaftar/export', [PendaftarController::class, 'export'])->name('dashboard.pendaftar.export');
    Route::get('/dashboard/pendaftar/{id}', [PendaftarController::class, 'show'])->name('dashboard.pendaftar.show');
    Route::delete('/dashboard/pendaftar/{id}', [PendaftarController::class, 'destroy'])->name('dashboard.pendaftar.destroy');
    Route::get('/dashboard/pendaftar/export-simple', [PendaftarController::class, 'exportSimple'])->name('dashboard.pendaftar.exportSimple');

    
    // Future routes for dashboard modules
    // Route::get('/dashboard/artikel', [DashboardController::class, 'artikel'])->name('dashboard.artikel');
    // Route::get('/dashboard/galeri', [DashboardController::class, 'galeri'])->name('dashboard.galeri');
});