<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_pengangkutan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jadwal', 10)->unique(); // JDW001, JDW002, ...

            // nullable: jadwal rutin bisa dibuat tanpa berasal dari laporan warga
            $table->foreignId('laporan_id')->nullable()->constrained('laporan')->nullOnDelete();

            $table->foreignId('tps_id')->constrained('tps')->cascadeOnDelete();
            $table->foreignId('petugas_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('kendaraan_id')->constrained('kendaraan')->cascadeOnDelete();

            $table->date('tanggal');
            $table->time('waktu');
            $table->enum('status', ['terjadwal', 'berjalan', 'selesai', 'dibatalkan'])->default('terjadwal');
            $table->string('catatan')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_pengangkutan');
    }
};
