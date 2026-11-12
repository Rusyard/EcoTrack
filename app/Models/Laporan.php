<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'kode_laporan',
        'tps_id',
        'pelapor_id',
        'tanggal_lapor',
        'deskripsi',
        'foto_url',
        'foto_sesudah',
        'prioritas',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_lapor' => 'datetime',
        ];
    }

    /**
     * foto_url sekarang menyimpan link Cloudinary (URL lengkap), tapi
     * laporan lama (sebelum pindah ke Cloudinary) masih menyimpan path
     * lokal (mis. "laporan/abc.jpg"). Accessor ini mengenali dua-duanya
     * otomatis, supaya Blade cukup pakai $laporan->foto_url langsung
     * tanpa perlu tahu laporan itu lama atau baru.
     */
    protected function fotoUrl(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => static::normalisasiUrlFoto($value),
        );
    }

    /**
     * Foto "sesudah" yang diunggah petugas lewat form Update Status,
     * dipakai bareng foto_url di halaman detail before/after. Null
     * selama petugas belum menyelesaikan & mengunggah foto buktinya.
     */
    protected function fotoSesudah(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => static::normalisasiUrlFoto($value),
        );
    }

    /**
     * Dipakai dua accessor di atas, supaya logic "Cloudinary vs path
     * lokal lama" cuma ada di satu tempat.
     */
    private static function normalisasiUrlFoto(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        return str_starts_with($value, 'http') ? $value : asset('storage/'.$value);
    }

    /**
     * @return BelongsTo<Tps, $this>
     */
    public function tps(): BelongsTo
    {
        return $this->belongsTo(Tps::class, 'tps_id');
    }

    /**
     * Masyarakat yang mengirim laporan ini.
     *
     * @return BelongsTo<User, $this>
     */
    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pelapor_id');
    }

    /**
     * Jadwal pengangkutan yang dibuat dinas buat laporan ini (kalau
     * sudah dijadwalkan). Dipakai buat tahu siapa petugasnya & kapan,
     * di halaman detail before/after.
     *
     * @return HasOne<JadwalPengangkutan, $this>
     */
    public function jadwalPengangkutan(): HasOne
    {
        return $this->hasOne(JadwalPengangkutan::class, 'laporan_id');
    }
}