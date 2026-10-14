@extends('layout.app')

@section('title', 'EcoTrack - Dashboard Monitoring')
@section('css', 'resources/css/dashboard_dinas.css')

@section('content')

<div class="layout">

  @include('partials.sidebar_dinas', ['aktif' => 'dashboard'])

  <!-- CONTENT -->
  <main class="content">

    @include('partials.topbar_dinas', ['judul' => 'Dashboard Monitoring', 'ikon' => 'grafik'])

    <!-- STAT CARDS -->
    <div class="stat-grid">
      @foreach ($statistik as $stat)
        @include('partials.stat_card', $stat)
      @endforeach
    </div>

    <!-- PANELS -->
    <div class="panel-grid">
      <div class="panel">
        <div class="panel-header">
          <div class="panel-title">Volume Sampah Mingguan</div>
          <div class="panel-badge">
            <svg viewBox="0 0 24 24"><path d="M23 6l-9.5 9.5-5-5L1 18"/><path d="M17 6h6v6"/></svg>
            {{ $kenaikanVolume }} dari minggu lalu
          </div>
        </div>

        <div class="bar-chart">
          @foreach ($volumeMingguan as $hari)
            <div class="bar-col">
              <div class="bar" style="height: {{ $hari['tinggi'] }}%"></div>
              <div class="bar-label">{{ $hari['hari'] }}</div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="panel">
        <div class="panel-header">
          <div class="panel-title">Peta TPS — Kota Madiun</div>
          <a href="{{ route('laporan.masuk.dinas') }}" class="panel-link">Lihat Laporan →</a>
        </div>

        <div class="map-area">
          @foreach ($wilayahPeta as $wilayah)
            <div class="map-district" style="{{ $wilayah['posisi'] }}">{{ $wilayah['nama'] }}</div>
          @endforeach

          @foreach ($titikPeta as $titik)
            <div class="map-dot {{ $titik['status'] }} {{ $titik['pulse'] ? 'pulse' : '' }}" style="top: {{ $titik['atas'] }}%; left: {{ $titik['kiri'] }}%;"></div>
          @endforeach
        </div>

        <div class="map-legend">
          @foreach ($legendaPeta as $legenda)
            <div class="legend-item"><span class="legend-dot {{ $legenda['status'] }}"></span>{{ $legenda['label'] }}</div>
          @endforeach
        </div>
      </div>
    </div>

  </main>

</div>

@endsection
