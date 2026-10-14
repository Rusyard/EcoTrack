<?php

namespace App\Http\Controllers;

class DashboardDinasController extends Controller
{
    public function beranda()
    {
        // Data placeholder - nanti diganti query tabel tps, laporan, dan users
        // (role = petugas). Bentuk array di bawah dipertahankan supaya view
        // tidak perlu diubah saat datanya berganti ke database.
        return view('beranda_dinas', [
            // Dipakai partial topbar_dinas
            'tanggal'   => now()->locale('id')->isoFormat('dddd, DD MMMM YYYY'),
            'tpsKritis' => 2,

            'statistik' => [
                ['nilai' => 6, 'judul' => 'Total TPS Aktif',   'sub' => 'Kota Madiun',      'warna' => 'green',  'bahaya' => false],
                ['nilai' => 3, 'judul' => 'Laporan Hari Ini',  'sub' => 'Masuk ke sistem',  'warna' => 'blue',   'bahaya' => false],
                ['nilai' => 3, 'judul' => 'Petugas Aktif',     'sub' => 'Siap bertugas',    'warna' => 'orange', 'bahaya' => false],
                ['nilai' => 3, 'judul' => 'Butuh Tindakan',    'sub' => 'Segera diproses',  'warna' => 'red',    'bahaya' => true],
            ],

            'kenaikanVolume' => '+12%',
            // tinggi = persen tinggi batang (100 = hari dengan volume terbanyak)
            'volumeMingguan' => [
                ['hari' => 'Sen', 'tinggi' => 75],
                ['hari' => 'Sel', 'tinggi' => 58],
                ['hari' => 'Rab', 'tinggi' => 50],
                ['hari' => 'Kam', 'tinggi' => 42],
                ['hari' => 'Jum', 'tinggi' => 67],
                ['hari' => 'Sab', 'tinggi' => 100],
                ['hari' => 'Min', 'tinggi' => 33],
            ],

            'wilayahPeta' => [
                ['nama' => 'Manguharjo', 'posisi' => 'top:14px; left:16px;'],
                ['nama' => 'Kartoharjo', 'posisi' => 'top:14px; right:16px;'],
                ['nama' => 'Manguharjo', 'posisi' => 'bottom:14px; left:16px;'],
                ['nama' => 'Taman',      'posisi' => 'bottom:14px; right:16px;'],
            ],

            // atas dan kiri dalam persen terhadap area peta
            'titikPeta' => [
                ['status' => 'aman',   'atas' => 35, 'kiri' => 60, 'pulse' => false],
                ['status' => 'kritis', 'atas' => 48, 'kiri' => 47, 'pulse' => true],
                ['status' => 'sedang', 'atas' => 30, 'kiri' => 78, 'pulse' => false],
                ['status' => 'aman',   'atas' => 75, 'kiri' => 30, 'pulse' => false],
                ['status' => 'aman',   'atas' => 82, 'kiri' => 68, 'pulse' => false],
            ],

            'legendaPeta' => [
                ['status' => 'aman',   'label' => 'Aman (< 50%)'],
                ['status' => 'sedang', 'label' => 'Sedang (50–79%)'],
                ['status' => 'kritis', 'label' => 'Kritis (≥ 80%)'],
            ],
        ]);
    }
}
