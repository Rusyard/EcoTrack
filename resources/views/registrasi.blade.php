<<<<<<< HEAD
@extends('layout.auth')

@section('title', 'EcoTrack - Buat Akun Baru')
@section('body_class', 'halaman-registrasi')

@section('content')

=======
@extends('layout.app')

@section('title', $judul)
@section('css', 'resources/css/registrasi.css')
@section('js', 'resources/js/registrasi.js')

@section('content')
>>>>>>> fb77bb798ca2e33a3d34cf345052a51739ffff2a

<div class="page">

  <!-- PANEL KIRI -->
  @include('partials.panel_kiri_registrasi', [
      'headline' => $headline,
      'subtext'  => $subtext,
      'fitur'    => $fitur,
  ])

  <!-- PANEL KANAN -->
  <div class="panel-right">
    <div class="form-wrapper">
      <h1 class="title">Buat Akun Baru</h1>
      <p class="lead">Daftarkan diri Anda untuk mulai berkontribusi pada kebersihan kota.</p>

      <form id="registerForm" method="POST" action="{{ route('registrasi.post') }}">
        @csrf
        <div class="field">
          <label for="fullname">Nama Lengkap</label>
          <div class="input-group">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
              <circle cx="12" cy="7" r="4"/>
            </svg>
            <input type="text" id="fullname" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap" required>
          </div>
          @error('nama_lengkap')
            <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        <div class="field">
          <label for="email">Email</label>
          <div class="input-group">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="2" y="4" width="20" height="16" rx="2"/>
              <path d="m2 7 10 6 10-6"/>
            </svg>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@ecotrack.com" autocomplete="email" required>
          </div>
          @error('email')
            <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        <div class="field">
          <label for="username">Username</label>
          <div class="input-group">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
<<<<<<< HEAD
              <circle cx="12" cy="7" r="4"/>
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
=======
              <path d="M17 20v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <path d="M23 20v-2a4 4 0 0 0-3-3.87"/>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            <select id="role" name="role" required>
              <option value="" disabled selected>Pilih Peran</option>
              @foreach ($opsiPeran as $nilai => $label)
                <option value="{{ $nilai }}">{{ $label }}</option>
              @endforeach
            </select>
            <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
              <path d="m6 9 6 6 6-6"/>
>>>>>>> fb77bb798ca2e33a3d34cf345052a51739ffff2a
            </svg>
            <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username" autocomplete="username" required>
          </div>
          @error('username')
            <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        <div class="row-2">
          <div class="field">
            <label for="password">Password</label>
            <div class="input-group">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
              </svg>
              <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>
          </div>

          <div class="field">
            <label for="confirmPassword">Konfirmasi Password</label>
            <div class="input-group">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="m9 12 2 2 4-4"/>
              </svg>
              <input type="password" id="confirmPassword" name="password_confirmation" placeholder="••••••••" required>
            </div>
          </div>
        </div>

        @error('password')
          <div class="error-text" style="margin-top: -8px; margin-bottom: 16px;">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn-submit">
          Daftar Sekarang
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M5 12h14"/>
            <path d="m12 5 7 7-7 7"/>
          </svg>
        </button>

<<<<<<< HEAD
        <p class="login-hint">Sudah punya akun? <a href={{ route('login') }}>Login di sini</a></p>
=======
        <p class="login-hint">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
>>>>>>> fb77bb798ca2e33a3d34cf345052a51739ffff2a

        <hr class="divider">

        <p class="fine-print">Dengan mendaftar, Anda menyetujui Syarat dan Ketentuan serta Kebijakan Privasi EcoTrack.</p>
      </form>
    </div>
  </div>

</div>

<<<<<<< HEAD
<script>
  document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const pass = document.getElementById('password').value;
    const confirm = document.getElementById('confirmPassword').value;
    if (pass !== confirm) {
      alert('Password dan konfirmasi password tidak cocok.');
      return;
    }
    alert('Form pendaftaran siap dihubungkan ke backend.');
  });
</script>

=======
>>>>>>> fb77bb798ca2e33a3d34cf345052a51739ffff2a
@endsection
