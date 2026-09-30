<div class="stat-card {{ ! empty($card['bahaya']) ? 'danger' : '' }}">
  <div class="stat-value {{ $card['warna'] }}">{{ $card['nilai'] }}</div>
  <div class="stat-title">{{ $card['judul'] }}</div>
  @if (isset($card['sub']))
    <div class="stat-sub">{{ $card['sub'] }}</div>
  @endif
</div>
