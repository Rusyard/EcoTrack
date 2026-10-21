@extends('layout.dinas')

@section('title', $judul)
@section('css', 'resources/css/jadwal_pengangkutan_dinas.css')
@section('js', 'resources/js/jadwal_pengangkutan_dinas.js')

@section('topbar')
    <div class="topbar">
      <div class="topbar-title">
        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
        Jadwal Pengangkutan
      </div>
      <div class="topbar-right">
        <div class="date-chip">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          {{ $tanggal }}
        </div>
        <div class="alert-chip">
          <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
          {{ $jumlahTpsKritis }} TPS Kritis
        </div>
      </div>
    </div>
@endsection

@section('content')
    <!-- STAT CARDS -->
    <div class="stat-grid">
      @foreach ($statistik as $s)
        @include('partials.stat_card_dinas', ['s' => $s])
      @endforeach
    </div>

    <!-- FILTER -->
    <div class="filter-bar">
      <div class="search-box">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <input type="text" id="searchInput" placeholder="Cari berdasarkan TPS atau petugas...">
      </div>
      <div class="status-select">
        <select id="statusFilter">
          <option value="semua">Semua Status</option>
          <option value="terjadwal">Terjadwal</option>
          <option value="berjalan">Sedang Berjalan</option>
          <option value="selesai">Selesai</option>
          <option value="batal">Dibatalkan</option>
        </select>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
      </div>
    </div>

    <!-- TABLE -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>ID Jadwal</th>
            <th>Tanggal &amp; Waktu</th>
            <th>Lokasi TPS</th>
            <th>Petugas</th>
            <th>Kendaraan</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="scheduleTableBody">
          @foreach ($jadwal as $j)
            @include('partials.baris_jadwal_dinas', ['j' => $j])
          @endforeach
        </tbody>
      </table>
    </div>
@endsection
