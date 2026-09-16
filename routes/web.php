<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ===== Halaman umum =====
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registrasi', function () {
    return view('registrasi');
})->name('registrasi');


// ===== Halaman yang butuh login (semua role) =====
Route::middleware('auth')->group(function () {

    // --- Masyarakat ---
    Route::get('/beranda-masyarakat', function () {
        return view('beranda_masyarakat');
    })->name('beranda.masyarakat');

    Route::get('/form-laporan', function () {
        return view('form_laporan');
    })->name('form.laporan');

    // --- Petugas ---
    Route::get('/beranda-petugas', function () {
        return view('beranda_petugas');
    })->name('beranda.petugas');

    // --- Dinas (Admin) ---
    Route::get('/beranda-dinas', function () {
        return view('beranda_dinas');
    })->name('beranda.dinas');

    Route::get('/laporan-masuk-dinas', function () {
        return view('laporan_masuk_dinas');
    })->name('laporan.masuk.dinas');

    Route::get('/jadwal-pengangkutan-dinas', function () {
        return view('jadwal_pengangkutan_dinas');
    })->name('jadwal.pengangkutan.dinas');

    Route::get('/keloladata-petugas-dinas', function () {
        return view('keloladata_petugas_dinas');
    })->name('keloladata.petugas.dinas');
});
