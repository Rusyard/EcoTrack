<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Formulir Pelaporan Kondisi TPS</title>
<link rel="stylesheet" href="{{ asset('css/form_laporan.css') }}">
</head>
<body>

  <div class="topbar">
    <a href="{{ route('beranda.masyarakat') }}" class="back-link">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
      Kembali
    </a>
    <div class="divider-v"></div>
    <div class="brand">
      <div class="brand-logo">
        <svg viewBox="0 0 24 24"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.9.66c.38-1 1.9-4.5 3.9-6.5C11 15 14 15 17 12c2.5-2.5 3-7 3-7s-4.5-.5-3 3Z"/></svg>
      </div>
      EcoTrack
    </div>
  </div>

  <div class="main">
    <h1 class="page-title">Formulir Pelaporan Kondisi TPS</h1>
    <p class="page-desc">Laporkan kondisi TPS yang membutuhkan perhatian segera dari Dinas Kebersihan.</p>

    <form id="reportForm">

      <!-- 1. PILIH LOKASI -->
      <div class="section">
        <div class="section-title">
          <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          1. Pilih Lokasi TPS
        </div>

        <div class="location-grid">
          <label class="location-option">
            <input type="radio" name="lokasi" value="TPS Taman Kota">
            <div class="location-card">
              <div class="location-name">TPS Taman Kota</div>
              <div class="location-addr">Jl. Pahlawan No. 12, Kartoharjo</div>
            </div>
          </label>

          <label class="location-option">
            <input type="radio" name="lokasi" value="TPS Pasar Besar">
            <div class="location-card">
              <div class="location-name">TPS Pasar Besar</div>
              <div class="location-addr">Jl. Sulawesi No. 5, Manguharjo</div>
            </div>
          </label>

          <label class="location-option">
            <input type="radio" name="lokasi" value="TPS Nambangan">
            <div class="location-card">
              <div class="location-name">TPS Nambangan</div>
              <div class="location-addr">Jl. Nambangan Lor No. 8, Manguharjo</div>
            </div>
          </label>

          <label class="location-option">
            <input type="radio" name="lokasi" value="TPS Pandean">
            <div class="location-card">
              <div class="location-name">TPS Pandean</div>
              <div class="location-addr">Jl. Pandean No. 3, Taman</div>
            </div>
          </label>

          <label class="location-option">
            <input type="radio" name="lokasi" value="TPS Oro-Oro Ombo">
            <div class="location-card">
              <div class="location-name">TPS Oro-Oro Ombo</div>
              <div class="location-addr">Jl. Kalimantan No. 11, Kartoharjo</div>
            </div>
          </label>

          <label class="location-option">
            <input type="radio" name="lokasi" value="TPS Kejuron">
            <div class="location-card">
              <div class="location-name">TPS Kejuron</div>
              <div class="location-addr">Jl. Mastrip No. 7, Manguharjo</div>
            </div>
          </label>
        </div>
      </div>

      <!-- 2. DESKRIPSI -->
      <div class="section">
        <div class="section-title">
          <svg viewBox="0 0 24 24"><path d="M4 4h16v16H4z"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
          2. Deskripsi Kondisi Lapangan
        </div>

        <textarea id="deskripsi" name="deskripsi" minlength="20" placeholder="Jelaskan kondisi TPS secara detail. Contoh: Sampah menumpuk dan meluber ke jalan, sudah 3 hari tidak diangkut. Bau menyengat dan terdapat genangan air di sekitar TPS..."></textarea>
        <div class="char-count"><span id="charCount">0</span> karakter — minimal 20 karakter</div>
      </div>

      <!-- 3. UPLOAD FOTO -->
      <div class="section">
        <div class="section-title">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
          3. Unggah Foto Kondisi TPS
        </div>

        <label class="upload-zone" id="uploadZone" for="fileInput">
          <div class="upload-icon">
            <svg viewBox="0 0 24 24"><path d="M12 15V3M6 9l6-6 6 6"/><path d="M4 17v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3"/></svg>
          </div>
          <div class="upload-title">Seret &amp; Lepaskan Foto</div>
          <div class="upload-sub">atau klik untuk memilih dari perangkat Anda</div>
          <div class="upload-format">Format: JPG, PNG, WEBP — Maks. 5MB</div>
          <input type="file" id="fileInput" accept="image/jpeg,image/png,image/webp">
          <div class="file-preview" id="filePreview"></div>
        </label>
      </div>

      <div class="actions">
        <button type="button" class="btn btn-cancel" onclick="window.location.href='dashboard-ecotrack.html'">Batal</button>
        <button type="submit" class="btn btn-submit">Kirim Laporan</button>
      </div>

    </form>
  </div>

  <script src="{{ asset('js/form_laporan.js') }}"></script>

</body>
</html>
