@extends('layout.app')

@section('title', 'EcoTrack - Laporan Masuk')
@section('css', 'resources/css/laporan_dinas.css')
@section('js', 'resources/js/laporan_dinas.js')

@section('content')

<div class="layout">

  @include('partials.sidebar_dinas', ['aktif' => 'laporan'])

  <!-- CONTENT -->
  <main class="content">

    @include('partials.topbar_dinas', ['judul' => 'Kelola Laporan Masyarakat', 'ikon' => 'grafik'])

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
            <tr
              data-status="{{ $l->status }}"
              data-search="{{ strtolower($l->kode_laporan.' '.$l->pelapor->nama_lengkap.' '.$l->tps->nama_tps) }}"
            >
              <td class="id-cell">{{ $l->kode_laporan }}</td>
              <td class="date-cell">{{ $l->tanggal_lapor->format('Y-m-d H:i') }}</td>
              <td class="pelapor-cell">{{ $l->pelapor->nama_lengkap }}</td>
              <td class="lokasi-cell">{{ $l->tps->nama_tps }}</td>
              <td class="desc-cell">{{ \Illuminate\Support\Str::limit($l->deskripsi, 60) }}</td>
              <td>
                @if ($l->foto_url)
                  <img
                    src="{{ $l->foto_url }}"
                    alt="Foto kondisi {{ $l->tps->nama_tps }}"
                    class="foto-thumb"
                    data-foto="{{ $l->foto_url }}"
                  >
                @else
                  <span class="foto-none">Tanpa foto</span>
                @endif
              </td>
              <td><span class="status-pill status-{{ $l->status }}">{{ ucfirst($l->status) }}</span></td>
              <td>
                @if ($l->status === 'selesai')
                  <span class="done-label">✓ Selesai</span>
                @elseif ($l->status === 'dijadwalkan')
                  <button class="action-btn validasi">Validasi</button>
                @else
                  <button class="action-btn jadwalkan">Jadwalkan</button>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="empty-cell">Belum ada laporan masuk.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </main>

  <!-- LIGHTBOX: lihat foto laporan ukuran penuh -->
  <div class="lightbox-overlay" id="lightboxOverlay">
    <div class="lightbox-box">
      <button type="button" class="lightbox-close" data-tutup-lightbox>
        <svg viewBox="0 0 24 24" fill="none" stroke="#111827" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
      <img id="lightboxImage" src="" alt="Foto laporan ukuran penuh">
    </div>
  </div>

</div>

@endsection
