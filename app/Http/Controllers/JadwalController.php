<?php

namespace App\Http\Controllers;

use App\Traits\DataSidebarDinas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JadwalController extends Controller
{
    use DataSidebarDinas;

    /**
     * Halaman "Jadwal Pengangkutan" dinas. Semua angka, teks, dan baris
     * tabel yang sebelumnya tertulis langsung di Blade sekarang dikirim
     * dari sini. Nilainya masih data contoh, sama seperti tampilan awal.
     */
    public function index(Request $request): View
    {
        return view('jadwal_pengangkutan_dinas', [
            'judul'       => 'EcoTrack - Jadwal Pengangkutan',
            'statistik'   => [
                ['warna' => 'blue',   'nilai' => 5, 'judul' => 'Jadwal Hari Ini'],
                ['warna' => 'orange', 'nilai' => 1, 'judul' => 'Sedang Berjalan'],
                ['warna' => 'green',  'nilai' => 3, 'judul' => 'Selesai'],
                ['warna' => 'gray',   'nilai' => 1, 'judul' => 'Dibatalkan'],
            ],
            // Teks status di kolom "Status" tabel.
            'labelStatus' => [
                'terjadwal' => 'Terjadwal',
                'berjalan'  => 'Sedang Berjalan',
                'selesai'   => 'Selesai',
                'batal'     => 'Dibatalkan',
            ],
            'jadwal'      => [
                ['kode' => 'JDW001', 'tanggal' => '01 Jun 2026', 'waktu' => '09:00', 'tps' => 'TPS Taman Kota',    'petugas' => 'Agus Widodo',    'kendaraan' => 'Truk B 9012 KA', 'status' => 'berjalan'],
                ['kode' => 'JDW002', 'tanggal' => '01 Jun 2026', 'waktu' => '11:00', 'tps' => 'TPS Nambangan',     'petugas' => 'Agus Widodo',    'kendaraan' => 'Truk B 9012 KA', 'status' => 'terjadwal'],
                ['kode' => 'JDW003', 'tanggal' => '01 Jun 2026', 'waktu' => '13:30', 'tps' => 'TPS Oro-Oro Ombo', 'petugas' => 'Dedi Kurniawan', 'kendaraan' => 'Truk B 4471 AB', 'status' => 'terjadwal'],
                ['kode' => 'JDW004', 'tanggal' => '31 Mei 2026', 'waktu' => '08:00', 'tps' => 'TPS Pasar Besar',   'petugas' => 'Dedi Kurniawan', 'kendaraan' => 'Truk B 4471 AB', 'status' => 'selesai'],
                ['kode' => 'JDW005', 'tanggal' => '31 Mei 2026', 'waktu' => '10:15', 'tps' => 'TPS Pandean',       'petugas' => 'Rina Wulandari', 'kendaraan' => 'Truk B 7723 CD', 'status' => 'selesai'],
                ['kode' => 'JDW006', 'tanggal' => '30 Mei 2026', 'waktu' => '14:00', 'tps' => 'TPS Kejuron',       'petugas' => 'Rina Wulandari', 'kendaraan' => 'Truk B 7723 CD', 'status' => 'batal'],
            ],
        ] + $this->dataSidebarDinas($request, 'jadwal') + $this->dataTopbarDinas());
    }
}
