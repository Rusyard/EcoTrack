@extends('layout.dinas')

@section('title', $judul)
@section('css', 'resources/css/keloladata_petugas_dinas.css')
@section('js', 'resources/js/keloladata_petugas_dinas.js')

@section('topbar')
    <div class="topbar">
      <div class="topbar-title">
        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Data Petugas
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
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
        <input type="text" id="searchInput" placeholder="Cari berdasarkan nama atau NIP...">
      </div>
      <div class="status-select">
        <select id="statusFilter">
          <option value="semua">Semua Status</option>
          <option value="aktif">Aktif</option>
          <option value="bertugas">Sedang Bertugas</option>
          <option value="cuti">Cuti</option>
          <option value="nonaktif">Nonaktif</option>
        </select>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
      </div>
      <button type="button" class="btn-new" onclick="bukaModalTambahPetugas()">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Tambah Petugas
      </button>
    </div>

    <!-- TABLE -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>Petugas</th>
            <th>NIP</th>
            <th>Wilayah Tugas</th>
            <th>Kontak</th>
            <th>Kendaraan</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="petugasTableBody">
          @forelse ($petugas as $p)
            @include('partials.baris_petugas_dinas', ['p' => $p])
          @empty
            <tr>
              <td colspan="7" style="text-align: center; padding: 28px; color: #6b7280;">
                Belum ada data petugas.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @include('partials.modal_tambah_petugas')
@endsection
