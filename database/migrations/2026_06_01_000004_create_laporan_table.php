<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_laporan', 10)->unique(); // RPT001, RPT002, ...

            $table->foreignId('tps_id')->constrained('tps')->cascadeOnDelete();
            $table->foreignId('pelapor_id')->constrained('users')->cascadeOnDelete();

            $table->dateTime('tanggal_lapor');
            $table->text('deskripsi');
            $table->string('foto_url')->nullable();
            $table->enum('prioritas', ['normal', 'mendesak'])->default('normal');
            $table->enum('status', ['menunggu', 'dijadwalkan', 'selesai'])->default('menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
