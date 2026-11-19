<?php

namespace App\Http\Controllers;

use App\Traits\DataSidebarDinas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DinasController extends Controller
{
    use DataSidebarDinas;

    /**
     * Beranda dinas (Dashboard Monitoring). Semua angka & teks yang
     * sebelumnya tertulis langsung di Blade sekarang dikirim dari sini.
     * Nilainya masih data contoh, sama seperti tampilan awal.
     */
    public function beranda(Request $request): View
    {
        return view('beranda_dinas', [
            'judul'           => 'EcoTrack - Dashboard Monitoring',
            'kenaikanVolume'  => '+12% dari minggu lalu',
            'volumeMingguan'  => [
                ['hari' => 'Sen', 'tinggi' => 75],
                ['hari' => 'Sel', 'tinggi' => 58],
                ['hari' => 'Rab', 'tinggi' => 50],
                ['hari' => 'Kam', 'tinggi' => 42],
                ['hari' => 'Jum', 'tinggi' => 67],
                ['hari' => 'Sab', 'tinggi' => 100],
                ['hari' => 'Min', 'tinggi' => 33],
            ],
            'titikPeta'       => [
                ['status' => 'aman',   'atas' => 35, 'kiri' => 60, 'pulse' => false],
                ['status' => 'kritis', 'atas' => 48, 'kiri' => 47, 'pulse' => true],
                ['status' => 'sedang', 'atas' => 30, 'kiri' => 78, 'pulse' => false],
                ['status' => 'aman',   'atas' => 75, 'kiri' => 30, 'pulse' => false],
                ['status' => 'aman',   'atas' => 82, 'kiri' => 68, 'pulse' => false],
            ],
        ] + $this->dataSidebarDinas($request, 'dashboard') + $this->dataTopbarDinas());
    }
}
