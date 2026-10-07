@extends('layout.app')

@section('title', $judul)
@section('css', 'resources/css/login.css')
@section('js', 'resources/js/login.js')

@section('content')

  <div class="login-wrapper">

    @include('partials.brand_login', ['brand' => $brand, 'tagline' => $tagline])

    <div class="login-card">
      <form id="loginForm" method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="field">
          <div class="field-header">
            <label for="username">Username atau NIP</label>
          </div>
          <div class="input-group" id="usernameGroup">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
              <circle cx="12" cy="7" r="4"/>
            </svg>
            <input type="text" id="username" name="identifier" placeholder="Masukkan username (masyarakat) atau NIP (petugas/dinas)" value="{{ old('identifier') }}" required>
          </div>
          <div class="error-text" id="errorText">ID tidak ditemukan. Periksa kembali username atau NIP Anda.</div>
        </div>

        <div class="field">
          <div class="field-header">
            <label for="password">Kata Sandi</label>
            <a href="#" class="forgot-link">Lupa Password?</a>
          </div>
          <div class="input-group">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <input type="password" id="password" name="password" placeholder="••••••••" required>
          </div>
        </div>

        <div class="remember-row">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Ingat Saya</label>
        </div>

        @error('identifier')
          <div class="error-text" style="display: block;">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn-submit">
          Masuk Ke Aplikasi
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
            <path d="M10 17l5-5-5-5"/>
            <path d="M15 12H3"/>
          </svg>
        </button>

        <hr class="divider">

        <div class="help-text">
          belum punya akun?<br>
          <a href="{{ route('registrasi') }}" class="help-link">
            Daftar Sekarang
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M18.36 12A6.36 6.36 0 1 1 12 5.64"/>
              <path d="M9 9h.01M15 9h.01"/>
              <path d="M9 15c.83.67 1.9 1 3 1s2.17-.33 3-1"/>
            </svg>
          </a>
        </div>
      </form>
    </div>
  </div>

@endsection
