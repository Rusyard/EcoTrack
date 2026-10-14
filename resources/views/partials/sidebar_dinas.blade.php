{{-- Variabel: $aktif = dashboard | laporan | jadwal | petugas ; opsional $badgeLaporan --}}
@php
  $menu = [
    ['kunci' => 'dashboard', 'label' => 'Dashboard',           'rute' => 'beranda.dinas'],
    ['kunci' => 'laporan',   'label' => 'Laporan Masuk',       'rute' => 'laporan.masuk.dinas'],
    ['kunci' => 'jadwal',    'label' => 'Jadwal Pengangkutan', 'rute' => 'jadwal.pengangkutan.dinas'],
    ['kunci' => 'petugas',   'label' => 'Data Petugas',        'rute' => 'keloladata.petugas.dinas'],
  ];
@endphp

<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="sidebar-logo">
      <svg viewBox="0 0 24 24"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
    </div>
    EcoTrack
  </div>

  <div class="org-box">
    <div class="org-label">DINAS KEBERSIHAN</div>
    <div class="org-name">Kota Madiun</div>
  </div>

  <ul class="nav-list">
    @foreach ($menu as $item)
      <li>
        <a href="{{ route($item['rute']) }}" class="nav-item {{ $aktif === $item['kunci'] ? 'active' : '' }}">
          @include('partials.ikon_dinas', ['nama' => $item['kunci']])
          {{ $item['label'] }}
          @if ($item['kunci'] === 'laporan')
            <span class="nav-badge">{{ $badgeLaporan ?? 3 }}</span>
          @endif
        </a>
      </li>
    @endforeach
  </ul>

  <div class="sidebar-footer">
    <div class="footer-label">Masuk sebagai</div>
    {{-- Auth::user() bernilai null saat mode pratinjau tanpa login --}}
    <div class="footer-name">{{ Auth::user()?->nama_lengkap ?? 'Admin Dinas' }}</div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-link">
        <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
        Keluar
      </button>
    </form>
  </div>
</aside>
