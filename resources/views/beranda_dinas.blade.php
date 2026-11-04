@extends('layout.dinas')

@section('title', 'EcoTrack - Dashboard Monitoring')

@section('content')

    <!-- STAT CARDS -->
    <div class="stat-grid">
      @foreach ($statCards as $card)
        @include('partials.stat_card', ['card' => $card])
      @endforeach
    </div>

    <!-- PANELS -->
    <div class="panel-grid">
      <div class="panel">
        <div class="panel-header">
          <div class="panel-title">Volume Sampah Mingguan</div>
          <div class="panel-badge">
            <svg viewBox="0 0 24 24"><path d="M23 6l-9.5 9.5-5-5L1 18"/><path d="M17 6h6v6"/></svg>
            +{{ $kenaikanVolume }}% dari minggu lalu
          </div>
        </div>

        <div class="bar-chart">
          @foreach ($volumeMingguan as $v)
            <div class="bar-col"><div class="bar" style="height:{{ $v['persen'] }}%"></div><div class="bar-label">{{ $v['hari'] }}</div></div>
          @endforeach
        </div>
      </div>

      <div class="panel">
        <div class="panel-header">
          <div class="panel-title">Peta TPS — Kota Madiun</div>
          <a href="{{ route('laporan.masuk.dinas') }}" class="panel-link">Lihat Laporan →</a>
        </div>

        <div class="map-area">
          <div class="map-district" style="top:14px; left:16px;">Manguharjo</div>
          <div class="map-district" style="top:14px; right:16px;">Kartoharjo</div>
          <div class="map-district" style="bottom:14px; left:16px;">Manguharjo</div>
          <div class="map-district" style="bottom:14px; right:16px;">Taman</div>

          @foreach ($petaTps as $titik)
            <div class="map-dot {{ $titik['status'] }} {{ ! empty($titik['pulse']) ? 'pulse' : '' }}" style="top:{{ $titik['top'] }}%; left:{{ $titik['left'] }}%;"></div>
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
