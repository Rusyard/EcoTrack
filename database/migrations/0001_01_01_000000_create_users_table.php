<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Timpa langsung file 0001_01_01_000000_create_users_table.php
     * yang sudah ada di project kamu dengan isi ini.
     *
     * Versi ini sudah termasuk tabel password_reset_tokens dan
     * sessions (bawaan default Laravel) yang kemarin sempat
     * ke-skip pas saya modif tabel users-nya.
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

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
