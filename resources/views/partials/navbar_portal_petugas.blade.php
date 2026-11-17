{{-- Variabel: $namaLengkap, $inisial, $nip, $wilayahTugas (dari controller) --}}
<nav class="navbar">
  <div class="nav-left">
    <div class="nav-logo">
      <svg viewBox="0 0 24 24"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.9.66c.38-1 1.9-4.5 3.9-6.5C11 15 14 15 17 12c2.5-2.5 3-7 3-7s-4.5-.5-3 3Z"/></svg>
    </div>
    <span class="nav-brand">EcoTrack</span>
    <span class="nav-sub">Portal Petugas</span>
  </div>
  <div class="nav-right">
    <div class="user-block">
      <div class="avatar">{{ $inisial }}</div>
      <div>
        <div class="user-name">{{ $namaLengkap }}</div>
        <div class="user-meta">NIP: {{ $nip }} · {{ $wilayahTugas }}</div>
      </div>
    </div>
    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
      @csrf
      <button type="submit" class="exit-icon" style="background: none; border: none; padding: 0; cursor: pointer; display: flex;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
          <path d="M16 17l5-5-5-5"/>
          <path d="M21 12H9"/>
        </svg>
      </button>
    </form>
  </div>
</nav>
