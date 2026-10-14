{{-- Variabel: $nama = dashboard | laporan | jadwal | petugas | grafik --}}
<svg viewBox="0 0 24 24">
  @switch($nama)
    @case('dashboard')
      <rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/>
      @break
    @case('laporan')
      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/>
      @break
    @case('jadwal')
      <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
      @break
    @case('grafik')
      <path d="M3 3v18h18"/><path d="M7 15l4-6 4 4 5-8"/>
      @break
    @case('petugas')
      <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
      @break
  @endswitch
</svg>
