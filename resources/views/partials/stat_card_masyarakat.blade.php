{{-- Variabel: $stat = ['warna' => green|blue|mint, 'ikon' => dokumen|jam|centang, 'nilai', 'label'] --}}
@php
  $ikonStat = [
    'dokumen' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/>',
    'jam'     => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
    'centang' => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m22 4-10 10-3-3"/>',
  ];
@endphp

<div class="stat-card">
  <div class="stat-icon {{ $stat['warna'] }}">
    <svg viewBox="0 0 24 24" stroke="currentColor">{!! $ikonStat[$stat['ikon']] ?? '' !!}</svg>
  </div>
  <div>
    <div class="stat-number">{{ $stat['nilai'] }}</div>
    <div class="stat-label">{{ $stat['label'] }}</div>
  </div>
</div>