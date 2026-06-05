<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriArtikelController;

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route yang dilindungi login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('artikel', ArtikelController::class)->except(['show']);
    Route::resource('penulis', PenulisController::class)->except(['show']);
    Route::resource('kategori', KategoriArtikelController::class)->except(['show']);
});

// Halaman utama diarahkan ke login
Route::get('/', function () {
    return redirect()->route('login');
});
