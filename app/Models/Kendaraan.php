<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';

    protected $fillable = [
        'plat_nomor',
        'jenis',
        'kapasitas_m3',
        'status',
    ];

    /**
     * @return HasMany<JadwalPengangkutan, $this>
     */
    public function jadwalPengangkutan(): HasMany
    {
        return $this->hasMany(JadwalPengangkutan::class, 'kendaraan_id');
    }
}