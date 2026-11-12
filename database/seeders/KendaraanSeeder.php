<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('kendaraan')->insert([
            ['plat_nomor' => 'B 9012 KA', 'jenis' => 'Truk Sampah', 'kapasitas_m3' => 6.00, 'status' => 'digunakan', 'created_at' => $now, 'updated_at' => $now],
            ['plat_nomor' => 'B 4471 AB', 'jenis' => 'Truk Sampah', 'kapasitas_m3' => 6.00, 'status' => 'tersedia', 'created_at' => $now, 'updated_at' => $now],
            ['plat_nomor' => 'B 7723 CD', 'jenis' => 'Truk Sampah', 'kapasitas_m3' => 4.50, 'status' => 'tersedia', 'created_at' => $now, 'updated_at' => $now],
            ['plat_nomor' => 'B 2290 EF', 'jenis' => 'Truk Sampah', 'kapasitas_m3' => 6.00, 'status' => 'tersedia', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
