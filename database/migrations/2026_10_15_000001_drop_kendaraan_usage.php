<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Aplikasi sudah tidak melacak data kendaraan sama sekali: fitur
     * "Jadwalkan" tidak lagi butuh kendaraan yang tersedia, jadi kolom
     * kendaraan_id di jadwal_pengangkutan dan tabel kendaraan itu sendiri
     * dibuang.
     */
    public function up(): void
    {
        Schema::table('jadwal_pengangkutan', function (Blueprint $table) {
            $table->dropForeign(['kendaraan_id']);
            $table->dropColumn('kendaraan_id');
        });

        Schema::dropIfExists('kendaraan');
    }

    public function down(): void
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor', 15)->unique();
            $table->string('jenis', 50)->default('Truk Sampah');
            $table->decimal('kapasitas_m3', 5, 2)->default(6.00);
            $table->enum('status', ['tersedia', 'digunakan', 'perbaikan'])->default('tersedia');
            $table->timestamps();
        });

        Schema::table('jadwal_pengangkutan', function (Blueprint $table) {
            // nullable, karena data kendaraan lama sudah tidak ada buat di-restore
            $table->foreignId('kendaraan_id')->nullable()->after('petugas_id')->constrained('kendaraan')->nullOnDelete();
        });
    }
};
