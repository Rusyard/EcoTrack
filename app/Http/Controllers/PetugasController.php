<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PetugasController extends Controller
{
    /**
     * Tampilkan halaman "Data Petugas" dengan data asli dari database
     * (sebelumnya tabel & angka statistik di halaman ini statis/hardcode).
     */
    public function index(): View
    {
        $petugas = User::where('role', 'petugas')
            ->orderBy('nama_lengkap')
            ->get();

        return view('keloladata_petugas_dinas', [
            'petugas'          => $petugas,
            'totalPetugas'     => $petugas->count(),
            'jumlahBertugas'   => $petugas->where('status', 'bertugas')->count(),
            'jumlahCuti'       => $petugas->where('status', 'cuti')->count(),
            'jumlahNonaktif'   => $petugas->where('status', 'nonaktif')->count(),
        ]);
    }

    /**
     * Simpan akun petugas baru. Hanya bisa diakses dinas (dijaga
     * middleware 'role:dinas' di routes/web.php).
     *
     * Petugas login pakai NIP (bukan email/username), jadi dua kolom
     * itu sengaja tidak diminta di form ini.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_lengkap'          => ['bail', 'required', 'string', 'min:3', 'max:100'],
            'nip'                   => ['bail', 'required', 'digits_between:8,20', 'unique:users,nip'],
            'kontak'                => ['bail', 'required', 'string', 'max:20', 'regex:/^[0-9+\-\s]+$/'],
            'wilayah_tugas'         => ['bail', 'required', 'string', 'in:Kartoharjo,Manguharjo,Taman'],
            'password'              => [
                'bail', 'required', 'string', 'min:8', 'max:72', 'confirmed',
                'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/',
            ],
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.min'      => 'Nama lengkap minimal 3 karakter.',
            'nama_lengkap.max'      => 'Nama lengkap maksimal 100 karakter.',

            'nip.required'           => 'NIP wajib diisi.',
            'nip.digits_between'     => 'NIP harus berupa angka, 8 sampai 20 digit.',
            'nip.unique'             => 'NIP ini sudah terdaftar.',

            'kontak.required'        => 'Nomor kontak wajib diisi.',
            'kontak.max'             => 'Nomor kontak maksimal 20 karakter.',
            'kontak.regex'           => 'Nomor kontak hanya boleh berisi angka, spasi, + dan -.',

            'wilayah_tugas.required' => 'Wilayah tugas wajib dipilih.',
            'wilayah_tugas.in'       => 'Wilayah tugas tidak valid.',

            'password.required'      => 'Password wajib diisi.',
            'password.min'           => 'Password minimal 8 karakter.',
            'password.max'           => 'Password maksimal 72 karakter.',
            'password.confirmed'     => 'Konfirmasi password tidak cocok.',
            'password.regex'         => 'Password harus mengandung huruf dan angka.',
        ]);

        try {
            User::create([
                'role'          => 'petugas',
                'nama_lengkap'  => $validated['nama_lengkap'],
                'nip'           => $validated['nip'],
                'kontak'        => $validated['kontak'],
                'wilayah_tugas' => $validated['wilayah_tugas'],
                'status'        => 'aktif',
                // Jangan Hash::make() di sini: cast 'hashed' di model User
                // sudah meng-hash otomatis (kalau dua kali, login akan gagal).
                'password'      => $validated['password'],
            ]);
        } catch (UniqueConstraintViolationException) {
            // Kasus langka: dua request tersimpan bersamaan lolos validasi
            // bareng-bareng, tapi ditolak oleh unique index di database.
            throw ValidationException::withMessages([
                'nip' => 'NIP ini sudah terdaftar.',
            ]);
        }

        return redirect()
            ->route('keloladata.petugas.dinas')
            ->with('success', 'Petugas baru berhasil ditambahkan.');
    }
}