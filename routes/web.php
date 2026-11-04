<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

// ===== Halaman umum =====
Route::get('/', [AuthController::class, 'welcome'])->name('welcome');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/registrasi', [AuthController::class, 'showRegistrasiForm'])->name('registrasi');


// ===== Halaman yang butuh login (semua role) =====
Route::middleware('auth')->group(function () {

    // --- Masyarakat ---
    Route::get('/beranda-masyarakat', [MasyarakatController::class, 'beranda'])->name('beranda.masyarakat');
    Route::get('/form-laporan', [LaporanController::class, 'create'])->name('form.laporan');

    // --- Petugas ---
    Route::get('/beranda-petugas', [PetugasController::class, 'beranda'])->name('beranda.petugas');
    Route::get('/detail-tugas/{id}', [PetugasController::class, 'detailTugas'])->name('detail.tugas.petugas');

    // --- Dinas (Admin) ---
    Route::get('/beranda-dinas', [DinasController::class, 'beranda'])->name('beranda.dinas');
    Route::get('/laporan-masuk-dinas', [DinasController::class, 'laporanMasuk'])->name('laporan.masuk.dinas');
    Route::get('/jadwal-pengangkutan-dinas', [DinasController::class, 'jadwalPengangkutan'])->name('jadwal.pengangkutan.dinas');
    Route::get('/keloladata-petugas-dinas', [DinasController::class, 'kelolaDataPetugas'])->name('keloladata.petugas.dinas');
});