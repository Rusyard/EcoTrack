@extends('layout.masyarakat')

@section('title', 'EcoTrack - ' . $judul)

@section('content')

  <div class="main">

    <!-- HERO -->
    <div class="hero">
      <div class="hero-eyebrow">Selamat datang kembali,</div>
      <div class="hero-name">{{ Auth::user()->nama_lengkap }}</div>
      <p class="hero-desc">Mari jaga kebersihan lingkungan sekitar kita! Laporkan kondisi TPS di dekat Anda.</p>
      <a href="{{ route('form.laporan') }}" class="btn-hero">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Laporkan Sekarang
      </a>
    </div>

    <!-- STAT CARDS -->
    <div class="stats">
      @foreach ($stats as $stat)
        @include('partials.stat_card_masyarakat', ['stat' => $stat])
      @endforeach
    </div>

    <!-- HISTORI -->
    <div class="history-card">
      <div class="history-header">
        <div class="history-title">Histori Laporan Saya</div>
      </div>

      <table>
        <thead>
          <tr>
            <th>ID Laporan</th>
            <th>Tanggal</th>
            <th>Lokasi TPS</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($laporan as $item)
            @include('partials.laporan_row', ['laporan' => $item])
          @endforeach
        </tbody>
      </table>
    </div>

  </div>

@endsection