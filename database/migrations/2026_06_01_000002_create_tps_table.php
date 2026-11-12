<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tps', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tps', 100);
            $table->string('alamat', 200);
            $table->string('wilayah', 50); // kecamatan
            $table->integer('kapasitas_kg')->default(1000);
            $table->integer('volume_saat_ini')->default(0);

            // Disimpan langsung (bukan generated column) supaya kompatibel
            // di semua database driver. Idealnya dihitung ulang tiap kali
            // volume_saat_ini berubah (lihat App\Models\Tps::levelVolume()
            // kalau mau dibuat sebagai accessor).
            $table->enum('level_volume', ['aman', 'sedang', 'kritis'])->default('aman');

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tps');
    }
};
