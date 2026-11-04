<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tps extends Model
{
    use HasFactory;

    protected $table = 'tps';

    protected $fillable = [
        'nama_tps',
        'alamat',
        'wilayah',
        'kapasitas_kg',
        'volume_saat_ini',
        'level_volume',
        'latitude',
        'longitude',
    ];

    /**
     * @return HasMany<Laporan, $this>
     */
    public function laporan(): HasMany
    {
        return $this->hasMany(Laporan::class, 'tps_id');
    }
}