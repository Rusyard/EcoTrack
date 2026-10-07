@extends('layout.app')

@section('title', 'EcoTrack - Dashboard')
@section('css', 'resources/css/beranda_masyarakat.css')

@section('content')

  @include('partials.navbar_masyarakat')

  <div class="main">

    <!-- HERO -->
    <div class="hero">
      <div class="hero-eyebrow">Selamat datang kembali,</div>
      <div class="hero-name">{{ $namaPengguna }}</div>
      <p class="hero-desc">Mari jaga kebersihan lingkungan sekitar kita! Laporkan kondisi TPS di dekat Anda.</p>
      <a href="{{ route('form.laporan') }}" class="btn-hero">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Laporkan Sekarang
      </a>
    </div>

    <!-- STAT CARDS -->
    <div class="stats">
      @foreach ($statistik as $stat)
        @include('partials.stat_card_masyarakat', ['stat' => $stat])
      @endforeach
    </div>

    <!-- HISTORI -->
    @include('partials.riwayat_laporan')

  </div>

@endsection