<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TpsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('tps')->insert([
            // id 1
            ['nama_tps' => 'TPS Taman Kota', 'alamat' => 'Jl. Pahlawan No. 12, Kartoharjo',
             'wilayah' => 'Kartoharjo', 'kapasitas_kg' => 1000, 'volume_saat_ini' => 880,
             'level_volume' => 'kritis', 'latitude' => -7.6298000, 'longitude' => 111.5239000,
             'created_at' => $now, 'updated_at' => $now],
            // id 2
            ['nama_tps' => 'TPS Pasar Besar', 'alamat' => 'Jl. Sulawesi No. 5, Manguharjo',
             'wilayah' => 'Manguharjo', 'kapasitas_kg' => 1200, 'volume_saat_ini' => 700,
             'level_volume' => 'sedang', 'latitude' => -7.6301000, 'longitude' => 111.5175000,
             'created_at' => $now, 'updated_at' => $now],
            // id 3
            ['nama_tps' => 'TPS Nambangan', 'alamat' => 'Jl. Nambangan Lor No. 8, Manguharjo',
             'wilayah' => 'Manguharjo', 'kapasitas_kg' => 1000, 'volume_saat_ini' => 960,
             'level_volume' => 'kritis', 'latitude' => -7.6255000, 'longitude' => 111.5150000,
             'created_at' => $now, 'updated_at' => $now],
            // id 4
            ['nama_tps' => 'TPS Pandean', 'alamat' => 'Jl. Pandean No. 3, Taman',
             'wilayah' => 'Taman', 'kapasitas_kg' => 900, 'volume_saat_ini' => 430,
             'level_volume' => 'aman', 'latitude' => -7.6340000, 'longitude' => 111.5300000,
             'created_at' => $now, 'updated_at' => $now],
            // id 5
            ['nama_tps' => 'TPS Oro-Oro Ombo', 'alamat' => 'Jl. Kalimantan No. 11, Kartoharjo',
             'wilayah' => 'Kartoharjo', 'kapasitas_kg' => 1000, 'volume_saat_ini' => 610,
             'level_volume' => 'sedang', 'latitude' => -7.6265000, 'longitude' => 111.5220000,
             'created_at' => $now, 'updated_at' => $now],
            // id 6
            ['nama_tps' => 'TPS Kejuron', 'alamat' => 'Jl. Mastrip No. 7, Manguharjo',
             'wilayah' => 'Manguharjo', 'kapasitas_kg' => 800, 'volume_saat_ini' => 300,
             'level_volume' => 'aman', 'latitude' => -7.6320000, 'longitude' => 111.5190000,
             'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
