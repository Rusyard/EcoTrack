{{-- Variabel: $judul, $ikon (lihat partials.ikon_dinas), $tanggal, $tpsKritis --}}
<div class="topbar">
  <div class="topbar-title">
    @include('partials.ikon_dinas', ['nama' => $ikon])
    {{ $judul }}
  </div>
  <div class="topbar-right">
    <div class="date-chip">
      <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
      {{ $tanggal }}
    </div>
    <div class="alert-chip">
      <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
      {{ $tpsKritis }} TPS Kritis
    </div>
  </div>
</div>
