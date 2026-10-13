<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalPengangkutan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pengangkutan';

    protected $fillable = [
        'kode_jadwal',
        'laporan_id',
        'tps_id',
        'petugas_id',
        'kendaraan_id',
        'tanggal',
        'waktu',
        'status',
        'catatan',
        'catatan_petugas',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    /**
     * Laporan yang jadi dasar jadwal ini dibuat. Bisa null (lihat
     * JDW006 di seeder) kalau jadwalnya bukan dari laporan masyarakat,
     * misalnya jadwal rutin.
     *
     * @return BelongsTo<Laporan, $this>
     */
    public function laporan(): BelongsTo
    {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }

    /**
     * @return BelongsTo<Tps, $this>
     */
    public function tps(): BelongsTo
    {
        return $this->belongsTo(Tps::class, 'tps_id');
    }

    /**
     * Petugas lapangan yang ditugaskan mengangkut.
     *
     * @return BelongsTo<User, $this>
     */
    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}