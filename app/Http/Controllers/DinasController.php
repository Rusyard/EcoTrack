<?php

namespace App\Http\Controllers;

class DinasController extends Controller
{
    /**
     * Data yang dipakai di semua halaman dinas (topbar dan sidebar).
     */
    private function dataUmum(): array
    {
        return [
            'tanggal'     => now()->locale('id')->translatedFormat('l, d F Y'),
            'tpsKritis'   => 2,
            'laporanBaru' => 3,
        ];
    }

    public function beranda()
    {
        return view('beranda_dinas', array_merge($this->dataUmum(), [
            'judul' => 'Dashboard Monitoring',
            'ikon'  => 'grafik',

            'statCards' => [
                ['nilai' => 6, 'warna' => 'green',  'judul' => 'Total TPS Aktif',  'sub' => 'Kota Madiun'],
                ['nilai' => 3, 'warna' => 'blue',   'judul' => 'Laporan Hari Ini', 'sub' => 'Masuk ke sistem'],
                ['nilai' => 3, 'warna' => 'orange', 'judul' => 'Petugas Aktif',    'sub' => 'Siap bertugas'],
                ['nilai' => 3, 'warna' => 'red',    'judul' => 'Butuh Tindakan',   'sub' => 'Segera diproses', 'bahaya' => true],
            ],

            'kenaikanVolume' => 12,
            'volumeMingguan' => [
                ['hari' => 'Sen', 'persen' => 75],
                ['hari' => 'Sel', 'persen' => 58],
                ['hari' => 'Rab', 'persen' => 50],
                ['hari' => 'Kam', 'persen' => 42],
                ['hari' => 'Jum', 'persen' => 67],
                ['hari' => 'Sab', 'persen' => 100],
                ['hari' => 'Min', 'persen' => 33],
            ],

            'petaTps' => [
                ['status' => 'aman',   'top' => 35, 'left' => 60],
                ['status' => 'kritis', 'top' => 48, 'left' => 47, 'pulse' => true],
                ['status' => 'sedang', 'top' => 30, 'left' => 78],
                ['status' => 'aman',   'top' => 75, 'left' => 30],
                ['status' => 'aman',   'top' => 82, 'left' => 68],
            ],
        ]));
    }

    public function laporanMasuk()
    {
        return view('laporan_masuk_dinas', array_merge($this->dataUmum(), [
            'judul' => 'Kelola Laporan Masyarakat',
            'ikon'  => 'grafik',

            'opsiStatus' => [
                'menunggu'    => 'Menunggu',
                'dijadwalkan' => 'Dijadwalkan',
                'selesai'     => 'Selesai',
            ],

            'laporan' => [
                ['id' => 'RPT001', 'tanggal' => '2026-05-31 14:20', 'pelapor' => 'Budi Santoso', 'lokasi' => 'TPS Taman Kota',    'deskripsi' => 'Sampah menumpuk dan berbau tidak sedap, sudah 2 hari belum...',                  'status' => 'dijadwalkan'],
                ['id' => 'RPT002', 'tanggal' => '2026-06-01 07:45', 'pelapor' => 'Budi Santoso', 'lokasi' => 'TPS Nambangan',     'deskripsi' => 'TPS penuh total, sampah meluber ke jalan dan mengganggu pejalan...',            'status' => 'menunggu'],
                ['id' => 'RPT005', 'tanggal' => '2026-06-01 09:30', 'pelapor' => 'Siti Rahayu',  'lokasi' => 'TPS Nambangan',     'deskripsi' => 'TPS penuh dan meluber ke jalan masuk perumahan. Perlu...',                      'status' => 'menunggu'],
                ['id' => 'RPT006', 'tanggal' => '2026-06-01 10:15', 'pelapor' => 'Siti Rahayu',  'lokasi' => 'TPS Oro-Oro Ombo',  'deskripsi' => 'Sampah organik mulai membusuk, perlu segera diangkut.',                         'status' => 'menunggu'],
                ['id' => 'RPT007', 'tanggal' => '2026-05-30 08:00', 'pelapor' => 'Siti Rahayu',  'lokasi' => 'TPS Pasar Besar',   'deskripsi' => 'Volume sampah naik signifikan pasca hari raya.',                                'status' => 'dijadwalkan'],
                ['id' => 'RPT003', 'tanggal' => '2026-05-28 10:00', 'pelapor' => 'Budi Santoso', 'lokasi' => 'TPS Pasar Besar',   'deskripsi' => 'Keterlambatan pengangkutan lebih dari 3 hari. Banyak lalat di sekitar...',      'status' => 'selesai'],
            ],
        ]));
    }

    public function jadwalPengangkutan()
    {
        return view('jadwal_pengangkutan_dinas', array_merge($this->dataUmum(), [
            'judul' => 'Jadwal Pengangkutan',
            'ikon'  => 'kalender',

            'statCards' => [
                ['nilai' => 5, 'warna' => 'blue',   'judul' => 'Jadwal Hari Ini'],
                ['nilai' => 1, 'warna' => 'orange', 'judul' => 'Sedang Berjalan'],
                ['nilai' => 3, 'warna' => 'green',  'judul' => 'Selesai'],
                ['nilai' => 1, 'warna' => 'gray',   'judul' => 'Dibatalkan'],
            ],

            'opsiStatus' => [
                'terjadwal' => 'Terjadwal',
                'berjalan'  => 'Sedang Berjalan',
                'selesai'   => 'Selesai',
                'batal'     => 'Dibatalkan',
            ],

            'jadwal' => [
                ['id' => 'JDW001', 'tanggal' => '01 Jun 2026', 'jam' => '09:00', 'tps' => 'TPS Taman Kota',   'petugas' => 'Agus Widodo',    'kendaraan' => 'Truk B 9012 KA', 'status' => 'berjalan'],
                ['id' => 'JDW002', 'tanggal' => '01 Jun 2026', 'jam' => '11:00', 'tps' => 'TPS Nambangan',    'petugas' => 'Agus Widodo',    'kendaraan' => 'Truk B 9012 KA', 'status' => 'terjadwal'],
                ['id' => 'JDW003', 'tanggal' => '01 Jun 2026', 'jam' => '13:30', 'tps' => 'TPS Oro-Oro Ombo', 'petugas' => 'Dedi Kurniawan', 'kendaraan' => 'Truk B 4471 AB', 'status' => 'terjadwal'],
                ['id' => 'JDW004', 'tanggal' => '31 Mei 2026', 'jam' => '08:00', 'tps' => 'TPS Pasar Besar',  'petugas' => 'Dedi Kurniawan', 'kendaraan' => 'Truk B 4471 AB', 'status' => 'selesai'],
                ['id' => 'JDW005', 'tanggal' => '31 Mei 2026', 'jam' => '10:15', 'tps' => 'TPS Pandean',      'petugas' => 'Rina Wulandari', 'kendaraan' => 'Truk B 7723 CD', 'status' => 'selesai'],
                ['id' => 'JDW006', 'tanggal' => '30 Mei 2026', 'jam' => '14:00', 'tps' => 'TPS Kejuron',      'petugas' => 'Rina Wulandari', 'kendaraan' => 'Truk B 7723 CD', 'status' => 'batal'],
            ],
        ]));
    }

    public function kelolaDataPetugas()
    {
        return view('keloladata_petugas_dinas', array_merge($this->dataUmum(), [
            'judul' => 'Data Petugas',
            'ikon'  => 'petugas',

            'statCards' => [
                ['nilai' => 8, 'warna' => 'blue',   'judul' => 'Total Petugas'],
                ['nilai' => 3, 'warna' => 'green',  'judul' => 'Sedang Bertugas'],
                ['nilai' => 1, 'warna' => 'orange', 'judul' => 'Cuti'],
                ['nilai' => 1, 'warna' => 'gray',   'judul' => 'Nonaktif'],
            ],

            'opsiStatus' => [
                'aktif'    => 'Aktif',
                'bertugas' => 'Sedang Bertugas',
                'cuti'     => 'Cuti',
                'nonaktif' => 'Nonaktif',
            ],

            'petugas' => [
                ['nama' => 'Agus Widodo',      'peran' => 'Petugas Lapangan', 'nip' => '19870512001', 'wilayah' => 'Kartoharjo', 'kontak' => '0812-3456-7801', 'kendaraan' => 'Truk B 9012 KA', 'status' => 'bertugas'],
                ['nama' => 'Dedi Kurniawan',   'peran' => 'Petugas Lapangan', 'nip' => '19900823002', 'wilayah' => 'Manguharjo', 'kontak' => '0813-2211-9087', 'kendaraan' => 'Truk B 4471 AB', 'status' => 'bertugas'],
                ['nama' => 'Rina Wulandari',   'peran' => 'Petugas Lapangan', 'nip' => '19921107003', 'wilayah' => 'Taman',      'kontak' => '0857-6634-2210', 'kendaraan' => 'Truk B 7723 CD', 'status' => 'bertugas'],
                ['nama' => 'Bambang Setiawan', 'peran' => 'Petugas Lapangan', 'nip' => '19880314004', 'wilayah' => 'Kartoharjo', 'kontak' => '0821-4432-6650', 'kendaraan' => 'Truk B 2290 EF', 'status' => 'aktif'],
                ['nama' => 'Yuli Astuti',      'peran' => 'Petugas Lapangan', 'nip' => '19950602005', 'wilayah' => 'Manguharjo', 'kontak' => '0878-1123-4590', 'kendaraan' => '-',              'status' => 'cuti'],
                ['nama' => 'Joko Prasetyo',    'peran' => 'Petugas Lapangan', 'nip' => '19850119006', 'wilayah' => 'Taman',      'kontak' => '0819-7765-3312', 'kendaraan' => '-',              'status' => 'nonaktif'],
            ],
        ]));
    }
}