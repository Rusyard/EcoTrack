<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Foto "sesudah" yang diunggah petugas lewat form Update Status,
        // dipasangkan dengan foto_url (foto "sebelum" dari masyarakat) di
        // halaman detail before/after.
        Schema::table('laporan', function (Blueprint $table) {
            $table->string('foto_sesudah')->nullable()->after('foto_url');
        });

        // catatan di tabel ini sudah dipakai dinas buat instruksi saat
        // menjadwalkan (lihat JadwalPengangkutanSeeder), jadi catatan
        // lapangan dari petugas butuh kolom sendiri biar tidak menimpa.
        Schema::table('jadwal_pengangkutan', function (Blueprint $table) {
            $table->text('catatan_petugas')->nullable()->after('catatan');
        });
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropColumn('foto_sesudah');
        });

        Schema::table('jadwal_pengangkutan', function (Blueprint $table) {
            $table->dropColumn('catatan_petugas');
        });
    }
};
