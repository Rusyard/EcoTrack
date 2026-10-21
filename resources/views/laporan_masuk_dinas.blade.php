@extends('layout.dinas')

@section('title', $judul)
@section('css', 'resources/css/laporan_masuk_dinas.css')
@section('js', 'resources/js/laporan_masuk_dinas.js')

@section('topbar')
    <div class="topbar">
      <div class="topbar-title">
        <svg viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 15l4-6 4 4 5-8"/></svg>
        Kelola Laporan Masyarakat
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
    <!-- FILTER -->
    <div class="filter-bar">
      <div class="search-box">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <input type="text" id="searchInput" placeholder="Cari berdasarkan TPS atau nama pelapor...">
      </div>
      <div class="status-select">
        <select id="statusFilter">
          <option value="semua">Semua Status</option>
          <option value="menunggu">Menunggu</option>
          <option value="dijadwalkan">Dijadwalkan</option>
          <option value="selesai">Selesai</option>
        </select>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
      <div class="alert" style="background:#fef2f2; color:#b91c1c; border:1px solid #fecaca;">
        {{ $errors->first() }}
      </div>
    @endif

    <!-- TABLE -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Pelapor</th>
            <th>Lokasi TPS</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="reportTableBody">
          @forelse ($laporan as $l)
            @include('partials.baris_laporan_dinas', ['l' => $l])
          @empty
            <tr>
              <td colspan="8" style="text-align: center; padding: 28px; color: #6b7280;">
                Belum ada laporan masuk.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    @include('partials.lightbox_foto')

    @include('partials.modal_jadwalkan')
@endsection
