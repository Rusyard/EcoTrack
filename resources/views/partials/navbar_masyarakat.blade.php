{{-- Variabel: $namaPengguna --}}
<nav class="navbar">
  <div class="nav-left">
    <div class="nav-logo">
      <svg viewBox="0 0 24 24">
        <path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.9.66c.38-1 1.9-4.5 3.9-6.5C11 15 14 15 17 12c2.5-2.5 3-7 3-7s-4.5-.5-3 3Z"/>
      </svg>
    </div>
    EcoTrack
  </div>

  <div class="nav-right">
    <div class="icon-btn">
      <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
      <span class="notif-dot"></span>
    </div>

    <div class="user-chip">
      <div class="avatar">{{ strtoupper(substr($namaPengguna, 0, 1)) }}</div>
      {{ explode(' ', $namaPengguna)[0] }}
    </div>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-icon" title="Keluar">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
          <path d="M16 17l5-5-5-5"/>
          <path d="M21 12H9"/>
        </svg>
      </button>
    </form>
  </div>
</nav>