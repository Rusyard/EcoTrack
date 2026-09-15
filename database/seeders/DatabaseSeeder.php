<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Urutan pemanggilan penting: tabel yang jadi "induk"
     * (users, tps, kendaraan) harus diisi dulu sebelum tabel
     * yang punya foreign key ke tabel tersebut (laporan,
     * jadwal_pengangkutan, notifikasi).
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TpsSeeder::class,
            KendaraanSeeder::class,
            LaporanSeeder::class,
            JadwalPengangkutanSeeder::class,
            NotifikasiSeeder::class,
        ]);
    }
}
