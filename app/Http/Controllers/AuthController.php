<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Proses login: cari user berdasarkan username / email / NIP,
     * cek password, lalu redirect sesuai role.
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'identifier' => ['required', 'string'],
            'password'   => ['required', 'string'],
        ], [
            'identifier.required' => 'Username atau NIP wajib diisi.',
            'password.required'   => 'Password wajib diisi.',
        ]);

        $identifier = $request->input('identifier');

        // Cari user berdasarkan username, email, ATAU nip — sesuai kolom
        // mana yang cocok, karena masyarakat pakai username/email
        // sedangkan petugas & dinas pakai NIP.
        $user = User::where('username', $identifier)
            ->orWhere('email', $identifier)
            ->orWhere('nip', $identifier)
            ->first();

        // Validasi manual (bukan Auth::attempt) karena field login-nya
        // bukan cuma 'email' seperti default Laravel, tapi bisa 3 jenis ID.
        if (! $user || ! \Illuminate\Support\Facades\Hash::check($request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'identifier' => 'Username, NIP, atau password yang Anda masukkan salah.',
            ]);
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return $this->redirectByRole($user);
    }

    /**
     * Logout & hapus session.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Tentukan halaman tujuan berdasarkan role user yang login.
     */
    private function redirectByRole(User $user): RedirectResponse
    {
        return match ($user->role) {
            'masyarakat' => redirect()->route('beranda.masyarakat'),
            'petugas'    => redirect()->route('beranda.petugas'),
            'dinas'      => redirect()->route('beranda.dinas'),
            default      => redirect()->route('login'),
        };
    }
}
