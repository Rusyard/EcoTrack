<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotifikasiSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('notifikasi')->insert([
            ['user_id' => 9, 'judul' => 'Laporan Baru Masuk',
             'pesan' => 'RPT005 dari Siti Rahayu untuk TPS Nambangan membutuhkan validasi.',
             'dibaca' => false, 'created_at' => $now, 'updated_at' => $now],

            ['user_id' => 9, 'judul' => 'TPS Kritis',
             'pesan' => 'TPS Nambangan telah mencapai 96% kapasitas.',
             'dibaca' => false, 'created_at' => $now, 'updated_at' => $now],

            ['user_id' => 3, 'judul' => 'Jadwal Baru',
             'pesan' => 'Anda ditugaskan mengangkut sampah di TPS Taman Kota pukul 09:00.',
             'dibaca' => true, 'created_at' => $now, 'updated_at' => $now],

            ['user_id' => 1, 'judul' => 'Laporan Diproses',
             'pesan' => 'Laporan RPT001 Anda sedang dijadwalkan untuk pengangkutan.',
             'dibaca' => false, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
