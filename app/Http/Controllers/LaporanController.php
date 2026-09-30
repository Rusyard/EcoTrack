<?php

namespace App\Http\Controllers;

class LaporanController extends Controller
{
    public function create()
    {
        // Data placeholder - nanti diganti Tps::all() (tabel tps).
        return view('form_laporan', [
            'judul'   => 'Formulir Pelaporan Kondisi TPS',
            'kembali' => route('beranda.masyarakat'),

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

    // Nanti: public function store(Request $request) { ... } untuk menyimpan laporan
}