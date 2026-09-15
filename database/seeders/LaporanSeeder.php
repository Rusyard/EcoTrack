<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // pelapor_id: 1 = Budi Santoso, 2 = Siti Rahayu
        // tps_id: 1 Taman Kota, 2 Pasar Besar, 3 Nambangan, 4 Pandean, 5 Oro-Oro Ombo, 6 Kejuron
        DB::table('laporan')->insert([
            ['kode_laporan' => 'RPT001', 'tps_id' => 1, 'pelapor_id' => 1,
             'tanggal_lapor' => '2026-05-31 14:20:00',
             'deskripsi' => 'Sampah menumpuk dan berbau tidak sedap, sudah 2 hari belum diangkut. Volume sudah hampir penuh.',
             'foto_url' => null, 'prioritas' => 'mendesak', 'status' => 'dijadwalkan',
             'created_at' => $now, 'updated_at' => $now],

            ['kode_laporan' => 'RPT002', 'tps_id' => 3, 'pelapor_id' => 1,
             'tanggal_lapor' => '2026-06-01 07:45:00',
             'deskripsi' => 'TPS penuh total, sampah meluber ke jalan dan mengganggu pejalan kaki.',
             'foto_url' => null, 'prioritas' => 'mendesak', 'status' => 'menunggu',
             'created_at' => $now, 'updated_at' => $now],

            ['kode_laporan' => 'RPT003', 'tps_id' => 2, 'pelapor_id' => 1,
             'tanggal_lapor' => '2026-05-28 10:00:00',
             'deskripsi' => 'Keterlambatan pengangkutan lebih dari 3 hari. Banyak lalat dan tikus di sekitar TPS.',
             'foto_url' => null, 'prioritas' => 'normal', 'status' => 'selesai',
             'created_at' => $now, 'updated_at' => $now],

            ['kode_laporan' => 'RPT004', 'tps_id' => 5, 'pelapor_id' => 2,
             'tanggal_lapor' => '2026-05-27 09:10:00',
             'deskripsi' => 'Bak sampah hampir penuh dan butuh pengangkutan segera sebelum akhir pekan.',
             'foto_url' => null, 'prioritas' => 'normal', 'status' => 'selesai',
             'created_at' => $now, 'updated_at' => $now],

            ['kode_laporan' => 'RPT005', 'tps_id' => 3, 'pelapor_id' => 2,
             'tanggal_lapor' => '2026-06-01 09:30:00',
             'deskripsi' => 'TPS penuh dan meluber ke jalan masuk perumahan. Perlu penanganan cepat.',
             'foto_url' => null, 'prioritas' => 'normal', 'status' => 'menunggu',
             'created_at' => $now, 'updated_at' => $now],

            ['kode_laporan' => 'RPT006', 'tps_id' => 5, 'pelapor_id' => 2,
             'tanggal_lapor' => '2026-06-01 10:15:00',
             'deskripsi' => 'Sampah organik mulai membusuk, perlu segera diangkut.',
             'foto_url' => null, 'prioritas' => 'normal', 'status' => 'menunggu',
             'created_at' => $now, 'updated_at' => $now],

            ['kode_laporan' => 'RPT007', 'tps_id' => 2, 'pelapor_id' => 2,
             'tanggal_lapor' => '2026-05-30 08:00:00',
             'deskripsi' => 'Volume sampah naik signifikan pasca hari raya.',
             'foto_url' => null, 'prioritas' => 'normal', 'status' => 'dijadwalkan',
             'created_at' => $now, 'updated_at' => $now],

            ['kode_laporan' => 'RPT008', 'tps_id' => 4, 'pelapor_id' => 1,
             'tanggal_lapor' => '2026-05-26 16:40:00',
             'deskripsi' => 'Kondisi TPS masih terkendali, hanya perlu jadwal rutin seperti biasa.',
             'foto_url' => null, 'prioritas' => 'normal', 'status' => 'selesai',
             'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
