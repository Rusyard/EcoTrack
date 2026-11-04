<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
     * Tampilkan halaman registrasi.
     */
    public function showRegisterForm()
    {
        return view('registrasi');
    }

    /**
     * Proses registrasi akun masyarakat.
     *
     * Registrasi publik HANYA membuat akun 'masyarakat'. Akun petugas &
     * dinas tidak boleh dibuat lewat form ini (mereka login pakai NIP dan
     * didaftarkan oleh dinas), makanya role & status TIDAK diambil dari input.
     */
    public function register(Request $request): RedirectResponse
    {
        // Email disimpan huruf kecil supaya cek unique konsisten di semua DB.
        $email = $request->input('email');
        if (is_string($email)) {
            $request->merge(['email' => strtolower(trim($email))]);
        }

        $validated = $request->validate([
            'nama_lengkap' => ['bail', 'required', 'string', 'min:3', 'max:100'],
            'email'        => ['bail', 'required', 'string', 'email:rfc', 'max:100', 'unique:users,email'],
            // Username wajib punya minimal satu huruf supaya tidak bisa
            // bentrok dengan NIP (angka semua), karena login mencocokkan
            // username / email / NIP di satu input yang sama.
            'username'     => ['bail', 'required', 'string', 'min:4', 'max:50', 'regex:/^(?=.*[A-Za-z])[A-Za-z0-9._]+$/', 'unique:users,username'],
            'password'     => [
                'bail', 'required', 'string', 'min:8', 'max:72', 'confirmed',
                'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/',
            ],
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'nama_lengkap.min'      => 'Nama lengkap minimal 3 karakter.',
            'nama_lengkap.max'      => 'Nama lengkap maksimal 100 karakter.',

            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Format email tidak valid.',
            'email.max'             => 'Email maksimal 100 karakter.',
            'email.unique'          => 'Email ini sudah terdaftar.',

            'username.required'     => 'Username wajib diisi.',
            'username.min'          => 'Username minimal 4 karakter.',
            'username.max'          => 'Username maksimal 50 karakter.',
            'username.regex'        => 'Username hanya boleh huruf, angka, titik, dan underscore, serta harus mengandung minimal satu huruf.',
            'username.unique'       => 'Username ini sudah dipakai.',

            'password.required'     => 'Password wajib diisi.',
            'password.min'          => 'Password minimal 8 karakter.',
            'password.max'          => 'Password maksimal 72 karakter.',
            'password.confirmed'    => 'Konfirmasi password tidak cocok.',
            'password.regex'        => 'Password harus mengandung huruf dan angka.',
        ]);

        try {
            $user = User::create([
                'role'         => 'masyarakat',
                'nama_lengkap' => $validated['nama_lengkap'],
                'email'        => $validated['email'],
                'username'     => $validated['username'],
                // Jangan Hash::make() di sini: cast 'hashed' di model User
                // sudah meng-hash otomatis (kalau dua kali, login akan gagal).
                'password'     => $validated['password'],
            ]);
        } catch (UniqueConstraintViolationException) {
            // Kasus langka: dua request daftar bersamaan (mis. tombol diklik 2x)
            // lolos validasi bareng-bareng, tapi ditolak oleh unique index DB.
            throw ValidationException::withMessages([
                'email' => 'Email atau username ini sudah dipakai.',
            ]);
        }

        // Langsung login setelah daftar, lalu arahkan ke beranda sesuai role.
        Auth::login($user);
        $request->session()->regenerate();

        return $this->redirectByRole($user);
    }

    /**
     * Tampilkan form "Lupa Password" step 1 (masukkan username/email/NIP).
     */
    public function showForgotPasswordForm(): View
    {
        return view('forgot_password');
    }

    /**
     * Proses "Lupa Password" step 1: cari akun berdasarkan username, email,
     * atau NIP — TANPA verifikasi email/OTP. Begitu akunnya ketemu, id-nya
     * disimpan sementara di session dan user langsung diarahkan ke form
     * bikin password baru (step 2).
     */
    public function sendResetLink(Request $request): RedirectResponse
    {
        $request->validate([
            'identifier' => ['required', 'string'],
        ], [
            'identifier.required' => 'Username, email, atau NIP wajib diisi.',
        ]);

        $identifier = $request->input('identifier');

        $user = User::where('username', $identifier)
            ->orWhere('email', $identifier)
            ->orWhere('nip', $identifier)
            ->first();

        if (! $user) {
            throw ValidationException::withMessages([
                'identifier' => 'Akun dengan username, email, atau NIP tersebut tidak ditemukan.',
            ]);
        }

        // Simpan id user di session, dipakai showResetForm() & resetPassword()
        // di bawah supaya step 2 tau ini punya siapa, dan supaya orang gak
        // bisa langsung buka /reset-password tanpa lewat step 1 ini dulu.
        $request->session()->put('reset_password_user_id', $user->id);

        return redirect()->route('password.reset');
    }

    /**
     * Tampilkan form password baru (step 2) — hanya bisa diakses setelah
     * lewat step 1 (sendResetLink) di session yang sama.
     */
    public function showResetForm(Request $request): View|RedirectResponse
    {
        if (! $request->session()->has('reset_password_user_id')) {
            return redirect()
                ->route('password.request')
                ->with('error', 'Silakan masukkan username, email, atau NIP Anda terlebih dahulu.');
        }

        return view('reset_password');
    }

    /**
     * Proses reset password (step 2): simpan password baru buat user yang
     * id-nya tersimpan di session dari step 1.
     */
    public function resetPassword(Request $request): RedirectResponse
    {
        $userId = $request->session()->get('reset_password_user_id');

        if (! $userId) {
            return redirect()
                ->route('password.request')
                ->with('error', 'Sesi reset password sudah habis, silakan ulangi dari awal.');
        }

        $validated = $request->validate([
            'password' => [
                'bail', 'required', 'string', 'min:8', 'max:72', 'confirmed',
                'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/',
            ],
        ], [
            'password.required'  => 'Password baru wajib diisi.',
            'password.min'       => 'Password minimal 8 karakter.',
            'password.max'       => 'Password maksimal 72 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.regex'     => 'Password harus mengandung huruf dan angka.',
        ]);

        $user = User::find($userId);

        if (! $user) {
            return redirect()
                ->route('password.request')
                ->with('error', 'Akun tidak ditemukan, silakan ulangi dari awal.');
        }

        // Jangan Hash::make() manual: cast 'hashed' di model User sudah
        // otomatis hash saat disimpan.
        $user->password = $validated['password'];
        $user->save();

        // Hapus dari session supaya /reset-password gak bisa dipakai lagi
        // buat akun yang sama tanpa ulang dari step 1.
        $request->session()->forget('reset_password_user_id');

        return redirect()
            ->route('login')
            ->with('success', 'Password berhasil diubah. Silakan masuk dengan password baru Anda.');
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