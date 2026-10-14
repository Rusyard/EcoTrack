@extends('layout.app')

@section('title', 'EcoTrack - Data Petugas')
@section('css', 'resources/css/data_petugas.css')
@section('js', 'resources/js/data_petugas.js')

@section('content')

<div class="layout">

  @include('partials.sidebar_dinas', ['aktif' => 'petugas'])

  <!-- CONTENT -->
  <main class="content">

    @include('partials.topbar_dinas', ['judul' => 'Data Petugas', 'ikon' => 'petugas'])

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- STAT CARDS -->
    <div class="stat-grid">
      @include('partials.stat_card', ['nilai' => $totalPetugas,    'judul' => 'Total Petugas',    'warna' => 'blue'])
      @include('partials.stat_card', ['nilai' => $jumlahBertugas,  'judul' => 'Sedang Bertugas',  'warna' => 'green'])
      @include('partials.stat_card', ['nilai' => $jumlahCuti,      'judul' => 'Cuti',             'warna' => 'orange'])
      @include('partials.stat_card', ['nilai' => $jumlahNonaktif,  'judul' => 'Nonaktif',         'warna' => 'gray'])
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
      <button type="button" class="btn-new" data-buka-modal>
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
            @include('partials.petugas_row', ['p' => $p])
          @empty
            <tr>
              <td colspan="7" class="empty-cell">Belum ada data petugas.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </main>

  @include('partials.modal_tambah_petugas')

</div>

@endsection
