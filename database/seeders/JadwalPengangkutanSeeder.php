<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalPengangkutanSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // petugas_id: 3 Agus (Kartoharjo), 4 Dedi (Manguharjo), 5 Rina (Taman),
        //             6 Bambang (Kartoharjo), 7 Yuli (Manguharjo), 8 Joko (Taman)
        DB::table('jadwal_pengangkutan')->insert([
            ['kode_jadwal' => 'JDW001', 'laporan_id' => 1, 'tps_id' => 1, 'petugas_id' => 3, 'kendaraan_id' => 1,
             'tanggal' => '2026-06-01', 'waktu' => '09:00:00', 'status' => 'berjalan',
             'catatan' => 'Prioritas tinggi - gunakan truk kapasitas besar.',
             'created_at' => $now, 'updated_at' => $now],

            ['kode_jadwal' => 'JDW002', 'laporan_id' => 2, 'tps_id' => 3, 'petugas_id' => 4, 'kendaraan_id' => 1,
             'tanggal' => '2026-06-01', 'waktu' => '11:00:00', 'status' => 'terjadwal',
             'catatan' => 'Perhatikan keamanan lalu lintas saat bongkar muat.',
             'created_at' => $now, 'updated_at' => $now],

            ['kode_jadwal' => 'JDW003', 'laporan_id' => 6, 'tps_id' => 5, 'petugas_id' => 6, 'kendaraan_id' => 2,
             'tanggal' => '2026-06-01', 'waktu' => '13:30:00', 'status' => 'terjadwal',
             'catatan' => null,
             'created_at' => $now, 'updated_at' => $now],

            ['kode_jadwal' => 'JDW004', 'laporan_id' => 3, 'tps_id' => 2, 'petugas_id' => 4, 'kendaraan_id' => 2,
             'tanggal' => '2026-05-31', 'waktu' => '08:00:00', 'status' => 'selesai',
             'catatan' => null,
             'created_at' => $now, 'updated_at' => $now],

            ['kode_jadwal' => 'JDW005', 'laporan_id' => 4, 'tps_id' => 4, 'petugas_id' => 5, 'kendaraan_id' => 3,
             'tanggal' => '2026-05-31', 'waktu' => '10:15:00', 'status' => 'selesai',
             'catatan' => null,
             'created_at' => $now, 'updated_at' => $now],

            ['kode_jadwal' => 'JDW006', 'laporan_id' => null, 'tps_id' => 6, 'petugas_id' => 7, 'kendaraan_id' => 3,
             'tanggal' => '2026-05-30', 'waktu' => '14:00:00', 'status' => 'dibatalkan',
             'catatan' => 'Kendaraan mengalami gangguan teknis.',
             'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
