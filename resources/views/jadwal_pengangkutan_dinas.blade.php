@extends('layout.app')

@section('title', 'EcoTrack - Jadwal Pengangkutan')
@section('css', 'resources/css/jadwal_pengangkutan.css')
@section('js', 'resources/js/jadwal_pengangkutan.js')

@section('content')

<div class="layout">

  @include('partials.sidebar_dinas', ['aktif' => 'jadwal'])

  <!-- CONTENT -->
  <main class="content">

    @include('partials.topbar_dinas', ['judul' => 'Jadwal Pengangkutan', 'ikon' => 'jadwal'])

    <!-- STAT CARDS -->
    <div class="stat-grid">
      @foreach ($statistik as $stat)
        @include('partials.stat_card', $stat)
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
      <button class="btn-new">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Buat Jadwal
      </button>
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
            <tr data-status="{{ $j['status'] }}" data-search="{{ strtolower($j['kode'].' '.$j['tps'].' '.$j['petugas']) }}">
              <td class="id-cell">{{ $j['kode'] }}</td>
              <td class="datetime-cell">{{ $j['tanggal'] }}<span class="time">{{ $j['jam'] }}</span></td>
              <td class="lokasi-cell">{{ $j['tps'] }}</td>
              <td class="petugas-cell"><span class="petugas-avatar">{{ strtoupper(substr($j['petugas'], 0, 1)) }}</span>{{ $j['petugas'] }}</td>
              <td class="kendaraan-cell">{{ $j['kendaraan'] }}</td>
              <td><span class="status-pill status-{{ $j['status'] }}">{{ $j['label'] }}</span></td>
              <td><a href="#" class="detail-link">Detail ›</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </main>

</div>

@endsection
