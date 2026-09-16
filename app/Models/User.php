<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi lewat mass-assignment.
     *
     * @var list<string>
     */
    protected $fillable = [
        'role',
        'nama_lengkap',
        'username',
        'email',
        'nip',
        'password',
        'kontak',
        'wilayah_tugas',
        'jabatan',
        'status',
        'foto_url',
    ];

    /**
     * Kolom yang disembunyikan saat model di-serialize (mis. jadi JSON).
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast tipe data kolom.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
