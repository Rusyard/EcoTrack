<?php

namespace App\Http\Controllers;

class JadwalPengangkutanController extends Controller
{
    public function index()
    {
        // Data placeholder - nanti diganti query tabel jadwal_pengangkutan
        // (join tps dan users). Bentuk array dipertahankan supaya view tidak
        // perlu diubah saat datanya berganti ke database.
        return view('jadwal_pengangkutan_dinas', [
            // Angka kartu statistik masih sama dengan tampilan awal.
            'statistik' => [
                ['nilai' => 5, 'judul' => 'Jadwal Hari Ini', 'warna' => 'blue'],
                ['nilai' => 1, 'judul' => 'Sedang Berjalan', 'warna' => 'orange'],
                ['nilai' => 3, 'judul' => 'Selesai',         'warna' => 'green'],
                ['nilai' => 1, 'judul' => 'Dibatalkan',      'warna' => 'gray'],
            ],

            // status: terjadwal | berjalan | selesai | batal
            'jadwal' => [
                ['kode' => 'JDW001', 'tanggal' => '01 Jun 2026', 'jam' => '09:00', 'tps' => 'TPS Taman Kota',    'petugas' => 'Agus Widodo',    'kendaraan' => 'Truk B 9012 KA', 'status' => 'berjalan',  'label' => 'Sedang Berjalan'],
                ['kode' => 'JDW002', 'tanggal' => '01 Jun 2026', 'jam' => '11:00', 'tps' => 'TPS Nambangan',     'petugas' => 'Agus Widodo',    'kendaraan' => 'Truk B 9012 KA', 'status' => 'terjadwal', 'label' => 'Terjadwal'],
                ['kode' => 'JDW003', 'tanggal' => '01 Jun 2026', 'jam' => '13:30', 'tps' => 'TPS Oro-Oro Ombo',  'petugas' => 'Dedi Kurniawan', 'kendaraan' => 'Truk B 4471 AB', 'status' => 'terjadwal', 'label' => 'Terjadwal'],
                ['kode' => 'JDW004', 'tanggal' => '31 Mei 2026', 'jam' => '08:00', 'tps' => 'TPS Pasar Besar',   'petugas' => 'Dedi Kurniawan', 'kendaraan' => 'Truk B 4471 AB', 'status' => 'selesai',   'label' => 'Selesai'],
                ['kode' => 'JDW005', 'tanggal' => '31 Mei 2026', 'jam' => '10:15', 'tps' => 'TPS Pandean',       'petugas' => 'Rina Wulandari', 'kendaraan' => 'Truk B 7723 CD', 'status' => 'selesai',   'label' => 'Selesai'],
                ['kode' => 'JDW006', 'tanggal' => '30 Mei 2026', 'jam' => '14:00', 'tps' => 'TPS Kejuron',       'petugas' => 'Rina Wulandari', 'kendaraan' => 'Truk B 7723 CD', 'status' => 'batal',     'label' => 'Dibatalkan'],
            ],
        ]);
    }
}
