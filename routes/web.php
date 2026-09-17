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

    Route::get('/detail-tugas/{id}', function ($id) {
        // Data dummy sementara - nanti diganti ambil dari tabel jadwal_pengangkutan berdasarkan $id
        $dummy = [
            1 => [
                'tps_target' => 'TPS Taman Kota',
                'alamat' => 'Jl. Pahlawan No. 12, Kartoharjo',
                'tanggal' => '2026-06-01',
                'jam' => '09:00',
                'kapasitas' => 85,
                'instruksi' => 'Prioritas tinggi - sudah 2 hari menumpuk. Gunakan truk kapasitas besar.',
                'status_saat_ini' => 'Sedang Diproses',
                'id_jadwal' => 'SCH001',
                'jenis_tugas' => 'Mendesak',
            ],
            2 => [
                'tps_target' => 'TPS Nambangan',
                'alamat' => 'Jl. Nambangan Lor No. 8, Manguharjo',
                'tanggal' => '2026-06-01',
                'jam' => '11:00',
                'kapasitas' => 92,
                'instruksi' => 'TPS penuh total, segera angkut. Perhatikan keamanan lalu lintas.',
                'status_saat_ini' => 'Belum Diangkut',
                'id_jadwal' => 'SCH002',
                'jenis_tugas' => 'Mendesak',
            ],
        ];

        $data = $dummy[$id] ?? $dummy[1];

        return view('detail_tugas_petugas', $data);
    })->name('detail.tugas.petugas');

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