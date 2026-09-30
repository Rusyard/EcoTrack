@extends('layout.auth')

@section('title', 'EcoTrack - Login')
@section('body_class', 'halaman-login')

@section('content')

  <div class="auth-wrapper">
    @include('partials.auth_brand')

    <div class="auth-card">

      @if (session('status'))
        <div class="success-text">{{ session('status') }}</div>
      @endif

      <form id="loginForm" method="POST" action="{{ route('login.post') }}">
        @csrf

        @include('partials.auth_field', [
          'id'          => 'username',
          'name'        => 'identifier',
          'label'       => 'Username atau NIP',
          'ikon'        => 'user',
          'placeholder' => 'Masukkan username (masyarakat) atau NIP (petugas/dinas)',
          'nilai'       => old('identifier'),
        ])

        @include('partials.auth_field', [
          'id'          => 'password',
          'name'        => 'password',
          'label'       => 'Kata Sandi',
          'ikon'        => 'lock',
          'tipe'        => 'password',
          'placeholder' => '••••••••',
          'tautan'      => ['teks' => 'Lupa Password?', 'href' => '#'],
        ])

        <div class="remember-row">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Ingat Saya</label>
        </div>

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