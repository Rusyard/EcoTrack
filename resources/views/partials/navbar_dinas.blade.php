<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="sidebar-logo">
      <svg viewBox="0 0 24 24"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.9.66c.38-1 1.9-4.5 3.9-6.5C11 15 14 15 17 12c2.5-2.5 3-7 3-7s-4.5-.5-3 3Z"/></svg>
    </div>
    EcoTrack
  </div>

  <div class="org-box">
    <div class="org-label">DINAS KEBERSIHAN</div>
    <div class="org-name">Kota Madiun</div>
  </div>

  <ul class="nav-list">
    <li>
      <a href="{{ route('beranda.dinas') }}" class="nav-item {{ request()->routeIs('beranda.dinas') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
        Dashboard
      </a>
    </li>
    <li>
      <a href="{{ route('laporan.masuk.dinas') }}" class="nav-item {{ request()->routeIs('laporan.masuk.dinas') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/></svg>
        Laporan Masuk
        @if (($laporanBaru ?? 0) > 0)
          <span class="nav-badge">{{ $laporanBaru }}</span>
        @endif
      </a>
    </li>
    <li>
      <a href="{{ route('jadwal.pengangkutan.dinas') }}" class="nav-item {{ request()->routeIs('jadwal.pengangkutan.dinas') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
        Jadwal Pengangkutan
      </a>
    </li>
    <li>
      <a href="{{ route('keloladata.petugas.dinas') }}" class="nav-item {{ request()->routeIs('keloladata.petugas.dinas') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Data Petugas
      </a>
    </li>
  </ul>

  <div class="sidebar-footer">
    <div class="footer-label">Masuk sebagai</div>
    <div class="footer-name">{{ Auth::user()->nama_lengkap }}</div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-link">
        <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
        Keluar
      </button>
    </form>
  </div>
</aside>
