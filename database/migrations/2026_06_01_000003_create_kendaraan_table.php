<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor', 15)->unique();
            $table->string('jenis', 50)->default('Truk Sampah');
            $table->decimal('kapasitas_m3', 5, 2)->default(6.00);
            $table->enum('status', ['tersedia', 'digunakan', 'perbaikan'])->default('tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
