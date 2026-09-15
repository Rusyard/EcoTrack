<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * File ini menggantikan migration users bawaan Laravel.
     * Timpa langsung file 0001_01_01_000000_create_users_table.php
     * yang sudah ada di project kamu dengan isi ini.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['masyarakat', 'petugas', 'dinas']);
            $table->string('nama_lengkap', 100);

            // dipakai oleh masyarakat
            $table->string('username', 50)->unique()->nullable();
            $table->string('email', 100)->unique()->nullable();

            // dipakai oleh petugas & dinas
            $table->string('nip', 20)->unique()->nullable();

            $table->string('password');
            $table->string('kontak', 20)->nullable();

            // khusus petugas
            $table->string('wilayah_tugas', 50)->nullable();

            // khusus dinas
            $table->string('jabatan', 80)->nullable();

            $table->enum('status', ['aktif', 'bertugas', 'cuti', 'nonaktif'])->default('aktif');
            $table->string('foto_url')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
