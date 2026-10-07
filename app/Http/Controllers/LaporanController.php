<?php

namespace App\Http\Controllers;

class LaporanController extends Controller
{
    /**
     * Tampilkan formulir pelaporan kondisi TPS.
     */
    public function create()
    {
        return view('form_laporan', [
            'judul'            => 'EcoTrack - Formulir Pelaporan Kondisi TPS',
            'judulHalaman'     => 'Formulir Pelaporan Kondisi TPS',
            'deskripsiHalaman' => 'Laporkan kondisi TPS yang membutuhkan perhatian segera dari Dinas Kebersihan.',
            'kembali'          => route('beranda.masyarakat'),

            // Data sementara - nanti diganti: Tps::orderBy('nama_tps')->get()
            'daftarTps' => [
                ['nama' => 'TPS Taman Kota',    'alamat' => 'Jl. Pahlawan No. 12, Kartoharjo'],
                ['nama' => 'TPS Pasar Besar',   'alamat' => 'Jl. Sulawesi No. 5, Manguharjo'],
                ['nama' => 'TPS Nambangan',     'alamat' => 'Jl. Nambangan Lor No. 8, Manguharjo'],
                ['nama' => 'TPS Pandean',       'alamat' => 'Jl. Pandean No. 3, Taman'],
                ['nama' => 'TPS Oro-Oro Ombo',  'alamat' => 'Jl. Kalimantan No. 11, Kartoharjo'],
                ['nama' => 'TPS Kejuron',       'alamat' => 'Jl. Mastrip No. 7, Manguharjo'],
            ],
        ]);
    }
}
