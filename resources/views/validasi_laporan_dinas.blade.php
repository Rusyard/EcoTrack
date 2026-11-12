<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Validasi {{ $laporan->kode_laporan }}</title>
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
    background: #0d2b21;
    padding: 14px 32px;
  }

  .back-link {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #b7d9c8;
    text-decoration: none;
    font-size: 0.9rem;
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

  .nav-brand { color: #fff; font-weight: 800; font-size: 0.98rem; }

  /* ===== MAIN ===== */
  .main {
    max-width: 640px;
    margin: 32px auto;
    padding: 0 20px 60px;
  }

  .card {
    background: #ffffff;
    border-radius: 16px;
    padding: 28px;
    box-shadow: 0 8px 28px rgba(0, 0, 0, 0.08);
  }

  .card-title {
    font-size: 1.2rem;
    font-weight: 800;
    margin-bottom: 4px;
  }

  .kode-laporan {
    font-family: monospace;
    color: #16a34a;
    font-size: 0.85rem;
    margin-bottom: 16px;
  }

  .deskripsi-box {
    background: #f5f7fa;
    border-radius: 10px;
    padding: 14px 16px;
    font-size: 0.88rem;
    color: #374151;
    line-height: 1.5;
    margin-bottom: 8px;
  }

  .meta-line {
    font-size: 0.78rem;
    color: #9ca3af;
    margin-bottom: 22px;
  }

  .before-after {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    margin-bottom: 24px;
  }

  .foto-col-label {
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.04em;
    color: #6b7280;
    margin-bottom: 8px;
  }

  .foto-box {
    border-radius: 12px;
    overflow: hidden;
    aspect-ratio: 4 / 3;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .foto-box img { width: 100%; height: 100%; object-fit: cover; }

  .foto-kosong {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
    text-align: center;
    padding: 10px;
  }

  .foto-kosong.sebelum { background: #fef2f2; color: #dc2626; }
  .foto-kosong.sesudah { background: #f0fdf4; color: #16a34a; }
  .foto-kosong.sesudah.belum { background: #f9fafb; color: #9ca3af; }

  .foto-kosong svg { width: 26px; height: 26px; stroke: currentColor; fill: none; stroke-width: 1.8; }
  .foto-kosong span { font-size: 0.8rem; font-weight: 700; }

  .btn-row { display: flex; gap: 12px; }

  .btn-kembali, .btn-konfirmasi {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    border: none;
    border-radius: 10px;
    padding: 13px;
    font-size: 0.9rem;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
  }

  .btn-kembali { background: #f1f2f4; color: #374151; }

  .btn-konfirmasi { background: #ea580c; color: #fff; }
  .btn-konfirmasi:disabled { background: #e5e7eb; color: #9ca3af; cursor: not-allowed; }

  .catatan-sudah-selesai {
    text-align: center;
    font-size: 0.85rem;
    color: #16a34a;
    font-weight: 700;
    padding: 13px;
  }

  @media (max-width: 480px) {
    .before-after { grid-template-columns: 1fr; }
    .btn-row { flex-direction: column; }
  }
</style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <a href="{{ route('laporan.masuk.dinas') }}" class="back-link">
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
      @php $jadwal = $laporan->jadwalPengangkutan; @endphp

      <div class="card-title">Validasi Penyelesaian Laporan</div>
      <div class="kode-laporan">{{ $laporan->kode_laporan }}</div>

      <div class="deskripsi-box">{{ $laporan->deskripsi }}</div>
      <div class="meta-line">
        @if ($jadwal)
          Dijadwalkan: {{ $jadwal->tanggal->format('d M Y') }} {{ \Illuminate\Support\Carbon::parse($jadwal->waktu)->format('H:i') }}
          @if ($jadwal->petugas)
            · Petugas: {{ $jadwal->petugas->nama_lengkap }}
          @endif
        @else
          Belum ada jadwal pengangkutan untuk laporan ini.
        @endif
        · Pelapor: {{ $laporan->pelapor->nama_lengkap }}
      </div>

      <div class="before-after">
        <div>
          <div class="foto-col-label">FOTO SEBELUM</div>
          <div class="foto-box">
            @if ($laporan->foto_url)
              <img src="{{ $laporan->foto_url }}" alt="Foto sebelum">
            @else
              <div class="foto-kosong sebelum">
                <svg viewBox="0 0 24 24"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3Z"/><circle cx="12" cy="13" r="3"/></svg>
                <span>Kondisi Kritis</span>
              </div>
            @endif
          </div>
        </div>

        <div>
          <div class="foto-col-label">FOTO SESUDAH</div>
          <div class="foto-box">
            @if ($laporan->foto_sesudah)
              <img src="{{ $laporan->foto_sesudah }}" alt="Foto sesudah">
            @else
              <div class="foto-kosong sesudah belum">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                <span>Menunggu Petugas</span>
              </div>
            @endif
          </div>
        </div>
      </div>

      @if ($laporan->status === 'selesai')
        <div class="catatan-sudah-selesai">✓ Laporan ini sudah ditutup</div>
      @else
        <div class="btn-row">
          <a href="{{ route('laporan.masuk.dinas') }}" class="btn-kembali">Kembali</a>
          <form method="POST" action="{{ route('laporan.validasi', $laporan) }}" style="flex:1;">
            @csrf
            <button type="submit" class="btn-konfirmasi" style="width:100%;" @disabled(! $laporan->foto_sesudah)>
              Konfirmasi &amp; Tutup Laporan
            </button>
          </form>
        </div>
        @unless ($laporan->foto_sesudah)
          <div style="text-align:center; font-size:0.78rem; color:#9ca3af; margin-top:10px;">
            Tombol aktif setelah petugas mengirim foto bukti pengangkutan.
          </div>
        @endunless
      @endif
    </div>
  </div>

</body>
</html>