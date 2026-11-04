<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function beranda()
    {
        return view('beranda_petugas', [
            'judul'     => 'Portal Petugas',
            'tanggal'   => now()->locale('id')->translatedFormat('l, d F Y'),
            'namaDepan' => explode(' ', Auth::user()->nama_lengkap)[0],

            'miniStats' => [
                ['nilai' => 8, 'label' => 'Selesai',  'kelas' => 'selesai'],
                ['nilai' => 1, 'label' => 'Diproses', 'kelas' => 'diproses'],
                ['nilai' => 1, 'label' => 'Tertunda', 'kelas' => 'tertunda'],
            ],

            'tabs' => [
                'hari-ini' => [
                    'label'      => 'Hari Ini',
                    'peringatan' => 'TUGAS MENDESAK — PRIORITAS TINGGI',
                    'rutin'      => false,
                    'tugas'      => [
                        [
                            'id'           => 1,
                            'tps'          => 'TPS Taman Kota',
                            'alamat'       => 'Jl. Pahlawan No. 12, Kartoharjo',
                            'catatan'      => 'Prioritas tinggi - sudah 2 hari menumpuk. Gunakan truk kapasitas besar.',
                            'jam'          => '09:00',
                            'status'       => 'proses',
                            'status_label' => 'Sedang Diproses',
                            'mendesak'     => true,
                            'ikon'         => 'truk',
                            'warna'        => 'blue',
                        ],
                        [
                            'id'           => 2,
                            'tps'          => 'TPS Nambangan',
                            'alamat'       => 'Jl. Nambangan Lor No. 8, Manguharjo',
                            'catatan'      => 'TPS penuh total, segera angkut. Perhatikan keamanan lalu lintas.',
                            'jam'          => '11:00',
                            'status'       => 'belum',
                            'status_label' => 'Belum Diangkut',
                            'mendesak'     => true,
                            'ikon'         => 'pin',
                            'warna'        => 'red',
                        ],
                    ],
                ],

                'besok' => [
                    'label'      => 'Besok',
                    'peringatan' => 'JADWAL RUTIN',
                    'rutin'      => true,
                    'tugas'      => [
                        [
                            'id'           => null,
                            'tps'          => 'TPS Oro-Oro Ombo',
                            'alamat'       => 'Jl. Kalimantan No. 11, Kartoharjo',
                            'catatan'      => 'Pengangkutan rutin mingguan.',
                            'jam'          => '08:00',
                            'status'       => 'belum',
                            'status_label' => 'Belum Diangkut',
                            'mendesak'     => false,
                            'ikon'         => 'pin',
                            'warna'        => 'green',
                        ],
                    ],
                ],
            ],
        ]);
    }

    public function detailTugas($id)
    {
        // Data dummy sementara - nanti diganti ambil dari tabel jadwal_pengangkutan berdasarkan $id
        $dummy = [
            1 => [
                'tps_target'      => 'TPS Taman Kota',
                'alamat'          => 'Jl. Pahlawan No. 12, Kartoharjo',
                'tanggal'         => '2026-06-01',
                'jam'             => '09:00',
                'kapasitas'       => 85,
                'instruksi'       => 'Prioritas tinggi - sudah 2 hari menumpuk. Gunakan truk kapasitas besar.',
                'status_saat_ini' => 'Sedang Diproses',
                'id_jadwal'       => 'SCH001',
                'jenis_tugas'     => 'Mendesak',
            ],
            2 => [
                'tps_target'      => 'TPS Nambangan',
                'alamat'          => 'Jl. Nambangan Lor No. 8, Manguharjo',
                'tanggal'         => '2026-06-01',
                'jam'             => '11:00',
                'kapasitas'       => 92,
                'instruksi'       => 'TPS penuh total, segera angkut. Perhatikan keamanan lalu lintas.',
                'status_saat_ini' => 'Belum Diangkut',
                'id_jadwal'       => 'SCH002',
                'jenis_tugas'     => 'Mendesak',
            ],
        ];

        $data = $dummy[$id] ?? $dummy[1];

        return view('detail_tugas_petugas', array_merge($data, [
            'judul'   => 'Detail Tugas Pengangkutan',
            'kembali' => route('beranda.petugas'),
            'petaPin' => [
                ['status' => 'aman',   'top' => 40,  'left' => 30],
                ['status' => 'sedang', 'top' => 70,  'left' => 130],
                ['status' => 'kritis', 'top' => 90,  'left' => 170],
                ['status' => 'aman',   'top' => 130, 'left' => 90],
            ],
        ]));
    }
}