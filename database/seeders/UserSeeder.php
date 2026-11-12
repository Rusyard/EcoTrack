<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('users')->insert([
            // --- Masyarakat --- (id 1-2)
            [
                'role' => 'masyarakat', 'nama_lengkap' => 'Budi Santoso',
                'username' => 'budisantoso', 'email' => 'budi.santoso@gmail.com', 'nip' => null,
                'password' => Hash::make('masyarakat123'), 'kontak' => '0812-1111-0001',
                'wilayah_tugas' => null, 'jabatan' => null, 'status' => 'aktif',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'role' => 'masyarakat', 'nama_lengkap' => 'Siti Rahayu',
                'username' => 'sitirahayu', 'email' => 'siti.rahayu@gmail.com', 'nip' => null,
                'password' => Hash::make('masyarakat123'), 'kontak' => '0812-1111-0002',
                'wilayah_tugas' => null, 'jabatan' => null, 'status' => 'aktif',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- Petugas Lapangan --- (id 3-8)
            [
                'role' => 'petugas', 'nama_lengkap' => 'Agus Widodo',
                'username' => null, 'email' => 'agus.widodo@ecotrack.id', 'nip' => '19870512001',
                'password' => Hash::make('petugas123'), 'kontak' => '0812-3456-7801',
                'wilayah_tugas' => 'Kartoharjo', 'jabatan' => null, 'status' => 'bertugas',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'role' => 'petugas', 'nama_lengkap' => 'Dedi Kurniawan',
                'username' => null, 'email' => 'dedi.kurniawan@ecotrack.id', 'nip' => '19900823002',
                'password' => Hash::make('petugas123'), 'kontak' => '0813-2211-9087',
                'wilayah_tugas' => 'Manguharjo', 'jabatan' => null, 'status' => 'bertugas',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'role' => 'petugas', 'nama_lengkap' => 'Rina Wulandari',
                'username' => null, 'email' => 'rina.wulandari@ecotrack.id', 'nip' => '19921107003',
                'password' => Hash::make('petugas123'), 'kontak' => '0857-6634-2210',
                'wilayah_tugas' => 'Taman', 'jabatan' => null, 'status' => 'bertugas',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'role' => 'petugas', 'nama_lengkap' => 'Bambang Setiawan',
                'username' => null, 'email' => 'bambang.setiawan@ecotrack.id', 'nip' => '19880314004',
                'password' => Hash::make('petugas123'), 'kontak' => '0821-4432-6650',
                'wilayah_tugas' => 'Kartoharjo', 'jabatan' => null, 'status' => 'aktif',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'role' => 'petugas', 'nama_lengkap' => 'Yuli Astuti',
                'username' => null, 'email' => 'yuli.astuti@ecotrack.id', 'nip' => '19950602005',
                'password' => Hash::make('petugas123'), 'kontak' => '0878-1123-4590',
                'wilayah_tugas' => 'Manguharjo', 'jabatan' => null, 'status' => 'cuti',
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'role' => 'petugas', 'nama_lengkap' => 'Joko Prasetyo',
                'username' => null, 'email' => 'joko.prasetyo@ecotrack.id', 'nip' => '19850119006',
                'password' => Hash::make('petugas123'), 'kontak' => '0819-7765-3312',
                'wilayah_tugas' => 'Taman', 'jabatan' => null, 'status' => 'nonaktif',
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- Dinas (Admin) --- (id 9)
            [
                'role' => 'dinas', 'nama_lengkap' => 'Ir. Ahmad Fauzi',
                'username' => null, 'email' => 'ahmad.fauzi@dinaskebersihan.madiunkota.go.id', 'nip' => '19700315001',
                'password' => Hash::make('dinas123'), 'kontak' => '0811-2233-4400',
                'wilayah_tugas' => null, 'jabatan' => 'Kepala Bidang Kebersihan', 'status' => 'aktif',
                'created_at' => $now, 'updated_at' => $now,
            ],
        ]);
    }
}
