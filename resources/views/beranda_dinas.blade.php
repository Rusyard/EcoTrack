@extends('layout.dinas')

@section('title', $judul)
@section('css', 'resources/css/beranda_dinas.css')

@section('topbar')
    <div class="topbar">
      <div class="topbar-title">
        <svg viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 15l4-6 4 4 5-8"/></svg>
        Dashboard Monitoring
      </div>
      <div class="topbar-right">
        <div class="date-chip">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          {{ $tanggal }}
        </div>
        <div class="alert-chip">
          <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
          {{ $jumlahTpsKritis }} TPS Kritis
        </div>
      </div>
    </div>
@endsection

@section('content')
    <!-- STAT CARDS -->
    <div class="stat-grid">
      @foreach ($statistik as $s)
        @include('partials.stat_card_dinas', ['s' => $s])
      @endforeach
    </div>

    <!-- PANELS -->
    <div class="panel-grid">
      <div class="panel">
        <div class="panel-header">
          <div class="panel-title">Volume Sampah Mingguan</div>
          <div class="panel-badge">
            <svg viewBox="0 0 24 24"><path d="M23 6l-9.5 9.5-5-5L1 18"/><path d="M17 6h6v6"/></svg>
            {{ $kenaikanVolume }}
          </div>
        </div>

        <div class="bar-chart">
          @foreach ($volumeMingguan as $v)
            <div class="bar-col"><div class="bar" style="height:{{ $v['tinggi'] }}%"></div><div class="bar-label">{{ $v['hari'] }}</div></div>
          @endforeach
        </div>
      </div>

      <div class="panel">
        <div class="panel-header">
          <div class="panel-title">Peta TPS — Kota Madiun</div>
          <a href="#" class="panel-link">Lihat Laporan →</a>
        </div>

        <div class="map-area">
          <div class="map-district" style="top:14px; left:16px;">Manguharjo</div>
          <div class="map-district" style="top:14px; right:16px;">Kartoharjo</div>
          <div class="map-district" style="bottom:14px; left:16px;">Manguharjo</div>
          <div class="map-district" style="bottom:14px; right:16px;">Taman</div>

          @foreach ($titikPeta as $t)
            <div class="map-dot {{ $t['status'] }}{{ $t['pulse'] ? ' pulse' : '' }}" style="top:{{ $t['atas'] }}%; left:{{ $t['kiri'] }}%;"></div>
          @endforeach
        </div>

        <div class="map-legend">
          <div class="legend-item"><span class="legend-dot aman"></span>Aman (&lt; 50%)</div>
          <div class="legend-item"><span class="legend-dot sedang"></span>Sedang (50–79%)</div>
          <div class="legend-item"><span class="legend-dot kritis"></span>Kritis (≥ 80%)</div>
        </div>
      </div>
    </div>
@endsection
