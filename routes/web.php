<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Route;

// ===== Halaman umum =====
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/registrasi', [AuthController::class, 'showRegisterForm'])->name('registrasi');
// throttle: maks 6 percobaan per menit per IP, biar form tidak bisa di-spam.
Route::post('/registrasi', [AuthController::class, 'register'])
    ->middleware('throttle:6,1')
    ->name('registrasi.post');

// ===== Lupa password =====
Route::get('/lupa-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
// throttle: maks 3 percobaan per menit per IP, biar kotak email orang lain
// tidak bisa dibanjiri link reset cuma dengan ngisi form berkali-kali.
Route::post('/lupa-password', [AuthController::class, 'sendResetLink'])
    ->middleware('throttle:3,1')
    ->name('password.email');

Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->middleware('throttle:6,1')
    ->name('password.update');


// ===== Halaman yang butuh login (semua role) =====
Route::middleware('auth')->group(function () {

    // --- Masyarakat ---
    Route::get('/beranda-masyarakat', [LaporanController::class, 'beranda'])->name('beranda.masyarakat');

    Route::get('/form-laporan', [LaporanController::class, 'create'])->name('form.laporan');

    // Hanya masyarakat yang mengirim laporan (petugas/dinas tidak masuk akal
    // jadi pelapor), jadi disamakan dengan pola role:dinas di bawah.
    Route::post('/form-laporan', [LaporanController::class, 'store'])
        ->middleware('role:masyarakat')
        ->name('form.laporan.store');

    // Halaman detail before/after punya masyarakat sendiri, dibuka dari
    // tombol "Detail" di histori laporan (beranda-masyarakat). Pengecekan
    // "ini laporan dia sendiri atau bukan" dilakukan di controller, bukan
    // cuma lewat middleware role, supaya satu masyarakat tidak bisa intip
    // laporan masyarakat lain cuma dengan ganti angka id di URL.
    Route::get('/laporan/{laporan}/detail', [LaporanController::class, 'detailSaya'])
        ->middleware('role:masyarakat')
        ->name('laporan.detail');

    // --- Petugas ---
    Route::middleware('role:petugas')->group(function () {
        Route::get('/beranda-petugas', [TugasController::class, 'beranda'])->name('beranda.petugas');

        Route::get('/detail-tugas/{jadwal}', [TugasController::class, 'show'])
            ->name('detail.tugas.petugas');

        Route::post('/detail-tugas/{jadwal}/selesai', [TugasController::class, 'selesaikan'])
            ->name('detail.tugas.selesai');
    });

    // --- Dinas (Admin) ---
    Route::get('/beranda-dinas', function () {
        return view('beranda_dinas');
    })->name('beranda.dinas');

    // Halaman ini menampilkan data pribadi pelapor (nama) dan foto laporan,
    // jadi dibatasi dinas saja — sama seperti halaman Data Petugas.
    Route::middleware('role:dinas')->group(function () {
        Route::get('/laporan-masuk-dinas', [LaporanController::class, 'index'])
            ->name('laporan.masuk.dinas');

        // Halaman before/after + tombol "Konfirmasi & Tutup Laporan",
        // dibuka dari tombol "Validasi" di tabel Laporan Masuk.
        Route::get('/laporan-masuk-dinas/{laporan}/validasi', [LaporanController::class, 'tampilkanValidasi'])
            ->name('laporan.validasi.show');

        Route::post('/laporan-masuk-dinas/{laporan}/validasi', [LaporanController::class, 'validasi'])
            ->name('laporan.validasi');

        // Modal "Buat Instruksi Jadwal Pengangkutan", dibuka dari tombol
        // "Jadwalkan" di tabel Laporan Masuk (laporan berstatus "menunggu").
        Route::post('/laporan-masuk-dinas/{laporan}/jadwalkan', [LaporanController::class, 'jadwalkan'])
            ->name('laporan.jadwalkan');
    });

    Route::get('/jadwal-pengangkutan-dinas', function () {
        return view('jadwal_pengangkutan_dinas');
    })->name('jadwal.pengangkutan.dinas');

    // Halaman ini menampilkan data pribadi petugas (NIP, kontak), dan
    // hanya dinas yang boleh menambah akun petugas baru, jadi GET & POST
    // dua-duanya dibatasi role:dinas.
    Route::middleware('role:dinas')->group(function () {
        Route::get('/keloladata-petugas-dinas', [PetugasController::class, 'index'])
            ->name('keloladata.petugas.dinas');

        Route::post('/keloladata-petugas-dinas', [PetugasController::class, 'store'])
            ->name('keloladata.petugas.store');
    });
});