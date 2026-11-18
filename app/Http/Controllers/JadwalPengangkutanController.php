<?php

namespace App\Http\Controllers;

use App\Models\JadwalPengangkutan;
use App\Models\Tps;
use App\Traits\DataSidebarDinas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JadwalPengangkutanController extends Controller
{
    use DataSidebarDinas;

    /**
     * Halaman "Jadwal Pengangkutan" dinas: semua jadwal yang dibuat lewat
     * tombol "Jadwalkan" di Laporan Masuk (sebelumnya halaman ini statis,
     * tidak membaca tabel jadwal_pengangkutan sama sekali).
     */
    public function index(Request $request): View
    {
        $jadwal = JadwalPengangkutan::with(['tps', 'petugas', 'laporan'])
            ->orderByDesc('tanggal')
            ->orderByDesc('waktu')
            ->get();

        return view('jadwal_pengangkutan_dinas', [
            'judul'         => 'EcoTrack - Jadwal Pengangkutan',
            'jadwal'        => $jadwal,
            'jadwalHariIni' => $jadwal->filter(fn ($j) => $j->tanggal->isToday())->count(),
            'berjalan'      => $jadwal->where('status', 'berjalan')->count(),
            'selesai'       => $jadwal->where('status', 'selesai')->count(),
            'tpsKritis'     => Tps::where('level_volume', 'kritis')->count(),
        ] + $this->dataSidebarDinas($request, 'jadwal'));
    }
}