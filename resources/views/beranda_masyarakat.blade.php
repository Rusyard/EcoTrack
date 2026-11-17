@extends('layout.masyarakat')

@section('title', $judul)
@section('css', 'resources/css/beranda_masyarakat.css')

@section('content')
  <div class="main">

    <!-- HERO -->
    <div class="hero">
      <div class="hero-eyebrow">Selamat datang kembali,</div>
      <div class="hero-name">{{ $namaLengkap }} </div>
      <p class="hero-desc">Mari jaga kebersihan lingkungan sekitar kita! Laporkan kondisi TPS di dekat Anda.</p>
      <a href="{{ route('form.laporan') }}" class="btn-hero">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Laporkan Sekarang
      </a>
    </div>

    <!-- STAT CARDS -->
    <div class="stats">
      <div class="stat-card">
        <div class="stat-icon green">
          <svg viewBox="0 0 24 24" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/></svg>
        </div>
        <div>
          <div class="stat-number">{{ $totalLaporan }}</div>
          <div class="stat-label">Laporan Terkirim</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon blue">
          <svg viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        </div>
        <div>
          <div class="stat-number">{{ $sedangDiproses }}</div>
          <div class="stat-label">Sedang Diproses</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon mint">
          <svg viewBox="0 0 24 24" stroke="currentColor"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m22 4-10 10-3-3"/></svg>
        </div>
        <div>
          <div class="stat-number">{{ $selesaiDiangkut }}</div>
          <div class="stat-label">Selesai Diangkut</div>
        </div>
      </div>
    </div>

    <!-- HISTORY -->
    <div class="history-card">
      <div class="history-header">
        <div class="history-title">Histori Laporan Saya</div>

      </div>

      <table>
        <thead>
          <tr>
            <th>ID Laporan</th>
            <th>Tanggal</th>
            <th>Lokasi TPS</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($laporanSaya as $laporan)
            <tr>
              <td class="id-cell">{{ $laporan->kode_laporan }}</td>
              <td>{{ $laporan->tanggal_lapor->format('Y-m-d') }}</td>
              <td>{{ $laporan->tps->nama_tps }}</td>
              <td class="desc-cell">{{ Str::limit($laporan->deskripsi, 80) }}</td>
              <td><span class="status-pill {{ $daftarStatus[$laporan->status]['kelas'] }}">{{ $daftarStatus[$laporan->status]['label'] }}</span></td>
              <td><a href="{{ route('laporan.detail', $laporan) }}" class="detail-link">Detail ›</a></td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="text-align: center; color: #9ca3af; padding: 28px 22px;">
                Belum ada laporan yang kamu kirim. Yuk laporkan kondisi TPS di sekitarmu.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
@endsection
