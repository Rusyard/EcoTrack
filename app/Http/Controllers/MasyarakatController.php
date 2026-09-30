<?php

namespace App\Http\Controllers;

class MasyarakatController extends Controller
{
    public function beranda()
    {
        // Data placeholder - nanti diganti query tabel laporan
        // (where pelapor_id = Auth::id()) join tabel tps.
        return view('beranda_masyarakat', [
            'judul' => 'Dashboard',

            'stats' => [
                ['warna' => 'green', 'ikon' => 'dokumen', 'nilai' => 4, 'label' => 'Laporan Terkirim'],
                ['warna' => 'blue',  'ikon' => 'jam',     'nilai' => 1, 'label' => 'Sedang Diproses'],
                ['warna' => 'mint',  'ikon' => 'centang', 'nilai' => 2, 'label' => 'Selesai Diangkut'],
            ],

            'laporan' => [
                [
                    'kode'         => 'RPT001',
                    'tanggal'      => '2026-05-31',
                    'tps'          => 'TPS Taman Kota',
                    'deskripsi'    => 'Sampah menumpuk dan berbau tidak sedap, sudah 2 hari belum diangkut. Volume sudah...',
                    'status'       => 'proses',
                    'status_label' => 'Proses Pengangkutan',
                ],
                [
                    'kode'         => 'RPT002',
                    'tanggal'      => '2026-06-01',
                    'tps'          => 'TPS Nambangan',
                    'deskripsi'    => 'TPS penuh total, sampah meluber ke jalan dan mengganggu pejalan kaki.',
                    'status'       => 'menunggu',
                    'status_label' => 'Menunggu Validasi',
                ],
                [
                    'kode'         => 'RPT003',
                    'tanggal'      => '2026-05-28',
                    'tps'          => 'TPS Pasar Besar',
                    'deskripsi'    => 'Keterlambatan pengangkutan lebih dari 3 hari. Banyak lalat dan tikus di sekitar TPS.',
                    'status'       => 'selesai',
                    'status_label' => 'Selesai',
                ],
                [
                    'kode'         => 'RPT004',
                    'tanggal'      => '2026-05-27',
                    'tps'          => 'TPS Oro-Oro Ombo',
                    'deskripsi'    => 'Bak sampah hampir penuh dan butuh pengangkutan segera sebelum akhir pekan.',
                    'status'       => 'selesai',
                    'status_label' => 'Selesai',
                ],
            ],
        ]);
    }
}