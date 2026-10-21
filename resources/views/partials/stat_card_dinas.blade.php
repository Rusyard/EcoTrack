<div class="stat-card{{ ($s['bahaya'] ?? false) ? ' danger' : '' }}">
  <div class="stat-value {{ $s['warna'] }}">{{ $s['nilai'] }}</div>
  <div class="stat-title">{{ $s['judul'] }}</div>
  @isset($s['keterangan'])
    <div class="stat-sub">{{ $s['keterangan'] }}</div>
  @endisset
</div>
