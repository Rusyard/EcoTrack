<div class="feature-card">
  <div class="feature-icon">
    @if ($fitur['ikon'] === 'lokasi')
      <svg viewBox="0 0 24 24">
        <path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/>
        <circle cx="12" cy="10" r="3"/>
      </svg>
    @else
      <svg viewBox="0 0 24 24">
        <rect x="3" y="3" width="18" height="18" rx="2"/>
        <path d="M8 17V11M12 17V7M16 17v-4"/>
      </svg>
    @endif
  </div>
  <div>
    <div class="feature-title">{{ $fitur['judul'] }}</div>
    <div class="feature-desc">{{ $fitur['deskripsi'] }}</div>
  </div>
</div>
