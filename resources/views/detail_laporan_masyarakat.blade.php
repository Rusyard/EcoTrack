<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Detail Laporan {{ $laporan->kode_laporan }}</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    background-color: #f5f7fa;
    color: #111827;
  }

  /* ===== NAVBAR ===== */
  .navbar {
    display: flex;
    align-items: center;
    gap: 16px;
    background: #ffffff;
    padding: 14px 32px;
    border-bottom: 1px solid #e5e7eb;
  }

  .back-link {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #6b7280;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
  }

  .back-link svg { width: 16px; height: 16px; stroke: currentColor; fill: none; stroke-width: 2; }

  .nav-logo {
    width: 26px;
    height: 26px;
    background: #1eb980;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .nav-logo svg { width: 14px; height: 14px; stroke: #fff; fill: none; stroke-width: 2.2; }

  .nav-brand { color: #0f7a4e; font-weight: 800; font-size: 0.98rem; }

  /* ===== MAIN ===== */
  .main {
    max-width: 760px;
    margin: 28px auto;
    padding: 0 20px 60px;
  }

  .card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    padding: 26px 28px;
  }

  .card-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 16px;
  }

  .card-title {
    font-size: 1.15rem;
    font-weight: 800;
    color: #111827;
  }

  .kode-laporan {
    font-family: monospace;
    color: #6b7280;
    font-size: 0.85rem;
    margin-top: 2px;
  }

  .status-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.82rem;
    font-weight: 700;
    padding: 5px 12px;
    border-radius: 999px;
    white-space: nowrap;
  }

  .status-pill::before {
    content: "";
    width: 7px;
    height: 7px;
    border-radius: 50%;
  }

  .status-menunggu { color: #d97706; background: #fef3c7; }
  .status-menunggu::before { background: #d97706; }

  .status-proses { color: #2563eb; background: #dbeafe; }
  .status-proses::before { background: #2563eb; }

  .status-selesai { color: #16a34a; background: #dcfce7; }
  .status-selesai::before { background: #16a34a; }

  .deskripsi-box {
    background: #f5f7fa;
    border-radius: 10px;
    padding: 14px 16px;
    font-size: 0.9rem;
    color: #374151;
    line-height: 1.5;
    margin-bottom: 10px;
  }

  .meta-line {
    font-size: 0.8rem;
    color: #9ca3af;
    margin-bottom: 22px;
  }

  .section-label {
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    color: #6b7280;
    text-transform: uppercase;
    margin-bottom: 10px;
  }

  .before-after {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 8px;
  }

  .foto-box {
    border-radius: 12px;
    overflow: hidden;
    aspect-ratio: 4 / 3;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
  }

  .foto-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .foto-kosong {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-align: center;
    padding: 12px;
  }

  .foto-kosong.sebelum { background: #fef2f2; color: #dc2626; }
  .foto-kosong.sesudah { background: #f9fafb; color: #9ca3af; }

  .foto-kosong svg { width: 28px; height: 28px; stroke: currentColor; fill: none; stroke-width: 1.8; }

  .foto-kosong span { font-size: 0.82rem; font-weight: 700; }

  .foto-label {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(0, 0, 0, 0.55);
    color: #fff;
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 999px;
  }

  .btn-kembali {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #f1f2f4;
    color: #374151;
    border: none;
    border-radius: 10px;
    padding: 12px 20px;
    font-size: 0.9rem;
    font-weight: 700;
    text-decoration: none;
    margin-top: 20px;
  }

  @media (max-width: 560px) {
    .before-after { grid-template-columns: 1fr; }
    .main { padding: 0 14px 40px; }
    .card { padding: 20px; }
  }
</style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <a href="{{ route('beranda.masyarakat') }}" class="back-link">
      <svg viewBox="0 0 24 24"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
      Kembali
    </a>
    <div class="nav-logo">
      <svg viewBox="0 0 24 24"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.9.66c.38-1 1.9-4.5 3.9-6.5C11 15 14 15 17 12c2.5-2.5 3-7 3-7s-4.5-.5-3 3Z"/></svg>
    </div>
    <span class="nav-brand">EcoTrack</span>
  </nav>

  <div class="main">
    <div class="card">
      @php
        $statusInfo = [
          'menunggu'    => ['kelas' => 'status-menunggu', 'label' => 'Menunggu Validasi'],
          'dijadwalkan' => ['kelas' => 'status-proses', 'label' => 'Proses Pengangkutan'],
          'selesai'     => ['kelas' => 'status-selesai', 'label' => 'Selesai'],
        ][$laporan->status];
        $jadwal = $laporan->jadwalPengangkutan;
      @endphp

      <div class="card-header">
        <div>
          <div class="card-title">{{ $laporan->tps->nama_tps }}</div>
          <div class="kode-laporan">{{ $laporan->kode_laporan }}</div>
        </div>
        <span class="status-pill {{ $statusInfo['kelas'] }}">{{ $statusInfo['label'] }}</span>
      </div>

      <div class="deskripsi-box">{{ $laporan->deskripsi }}</div>

      <div class="meta-line">
        Dilaporkan: {{ $laporan->tanggal_lapor->format('d M Y, H:i') }} WIB
        @if ($jadwal)
          · Dijadwalkan: {{ $jadwal->tanggal->format('d M Y') }} {{ \Illuminate\Support\Carbon::parse($jadwal->waktu)->format('H:i') }}
          @if ($jadwal->petugas)
            · Petugas: {{ $jadwal->petugas->nama_lengkap }}
          @endif
        @endif
      </div>

      <div class="section-label">Before / After</div>
      <div class="before-after">
        <div class="foto-box">
          @if ($laporan->foto_url)
            <img src="{{ $laporan->foto_url }}" alt="Foto sebelum">
            <span class="foto-label">SEBELUM</span>
          @else
            <div class="foto-kosong sebelum">
              <svg viewBox="0 0 24 24"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3Z"/><circle cx="12" cy="13" r="3"/></svg>
              <span>Tidak ada foto sebelum</span>
            </div>
          @endif
        </div>

        <div class="foto-box">
          @if ($laporan->foto_sesudah)
            <img src="{{ $laporan->foto_sesudah }}" alt="Foto sesudah">
            <span class="foto-label">SESUDAH</span>
          @else
            <div class="foto-kosong sesudah">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              <span>Menunggu petugas menyelesaikan tugas</span>
            </div>
          @endif
        </div>
      </div>

      <a href="{{ route('beranda.masyarakat') }}" class="btn-kembali">
        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
        Kembali ke Beranda
      </a>
    </div>
  </div>

</body>
</html>