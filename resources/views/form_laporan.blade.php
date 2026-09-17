<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Formulir Pelaporan Kondisi TPS</title>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    background-color: #f5f7fa;
    color: #111827;
  }

  /* TOPBAR */
  .topbar {
    display: flex;
    align-items: center;
    gap: 20px;
    background: #ffffff;
    padding: 14px 32px;
    border-bottom: 1px solid #e5e7eb;
  }

  .back-link {
    display: flex;
    align-items: center;
    gap: 6px;
    color: #374151;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
  }

  .back-link svg {
    width: 16px;
    height: 16px;
  }

  .divider-v {
    width: 1px;
    height: 18px;
    background: #e5e7eb;
  }

  .brand {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 800;
    color: #0f7a4e;
    font-size: 0.95rem;
  }

  .brand-logo {
    width: 24px;
    height: 24px;
    background: #1eb980;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .brand-logo svg {
    width: 13px;
    height: 13px;
    stroke: #ffffff;
    fill: none;
    stroke-width: 2.2;
  }

  /* MAIN */
  .main {
    max-width: 760px;
    margin: 32px auto 100px;
    padding: 0 24px;
  }

  h1.page-title {
    font-size: 1.6rem;
    font-weight: 800;
    margin-bottom: 8px;
  }

  .page-desc {
    color: #6b7280;
    font-size: 0.92rem;
    margin-bottom: 26px;
  }

  .section {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    padding: 22px 24px;
    margin-bottom: 18px;
  }

  .section-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 1rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 16px;
  }

  .section-title svg {
    width: 18px;
    height: 18px;
    color: #0f7a4e;
    stroke-width: 2;
    fill: none;
  }

  /* LOKASI TPS GRID */
  .location-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
  }

  .location-option {
    position: relative;
  }

  .location-option input[type="radio"] {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    margin: 0;
    cursor: pointer;
  }

  .location-card {
    border: 1px solid #d1d5db;
    border-radius: 10px;
    padding: 12px 16px;
    transition: border-color 0.15s ease, background-color 0.15s ease;
  }

  .location-option input[type="radio"]:checked + .location-card {
    border-color: #1eb980;
    background: #f0fbf5;
    box-shadow: 0 0 0 2px rgba(30, 185, 128, 0.15);
  }

  .location-name {
    font-weight: 700;
    font-size: 0.92rem;
    color: #111827;
    margin-bottom: 3px;
  }

  .location-addr {
    font-size: 0.8rem;
    color: #6b7280;
  }

  /* DESKRIPSI */
  textarea {
    width: 100%;
    min-height: 110px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    padding: 14px;
    font-size: 0.9rem;
    font-family: inherit;
    color: #111827;
    resize: vertical;
    outline: none;
    transition: border-color 0.15s ease, box-shadow 0.15s ease;
  }

  textarea::placeholder {
    color: #9ca3af;
  }

  textarea:focus {
    border-color: #1eb980;
    box-shadow: 0 0 0 3px rgba(30, 185, 128, 0.15);
  }

  .char-count {
    font-size: 0.78rem;
    color: #9ca3af;
    margin-top: 8px;
  }

  /* UPLOAD */
  .upload-zone {
    display: block;
    width: 100%;
    border: 2px dashed #c9e7d8;
    border-radius: 12px;
    background: #fafffc;
    padding: 40px 20px;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.15s ease, background-color 0.15s ease;
  }

  .upload-zone:hover,
  .upload-zone.dragover {
    border-color: #1eb980;
    background: #f0fbf5;
  }

  .upload-icon {
    width: 56px;
    height: 56px;
    background: #d7f5e3;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 18px;
  }

  .upload-icon svg {
    width: 24px;
    height: 24px;
    stroke: #0f7a4e;
    fill: none;
    stroke-width: 2.2;
  }

  .upload-title {
    font-weight: 700;
    font-size: 0.92rem;
    color: #111827;
    margin-bottom: 4px;
  }

  .upload-sub {
    font-size: 0.82rem;
    color: #6b7280;
    margin-bottom: 4px;
  }

  .upload-format {
    font-size: 0.75rem;
    color: #9ca3af;
  }

  #fileInput {
    display: none;
  }

  .file-preview {
    margin-top: 14px;
    font-size: 0.85rem;
    color: #0f7a4e;
    font-weight: 600;
    display: none;
  }

  /* ACTIONS */
  .actions {
    position: sticky;
    bottom: 0;
    display: flex;
    justify-content: flex-end;
    gap: 14px;
    background: #f5f7fa;
    padding: 18px 0 0;
  }

  .btn {
    border: none;
    border-radius: 9px;
    padding: 13px 26px;
    font-size: 0.92rem;
    font-weight: 700;
    cursor: pointer;
    min-width: 140px;
  }

  .btn-cancel {
    background: #ffffff;
    border: 1px solid #d1d5db;
    color: #374151;
  }

  .btn-cancel:hover {
    background: #f3f4f6;
  }

  .btn-submit {
    background: #1eb980;
    color: #ffffff;
  }

  .btn-submit:hover {
    background: #17a06e;
  }

  @media (max-width: 600px) {
    .location-grid {
      grid-template-columns: 1fr;
    }
    .actions {
      flex-direction: column-reverse;
    }
    .btn {
      width: 100%;
    }
  }
</style>
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

  <script>
    const textarea = document.getElementById('deskripsi');
    const charCount = document.getElementById('charCount');
    textarea.addEventListener('input', () => {
      charCount.textContent = textarea.value.length;
    });

    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const uploadZone = document.getElementById('uploadZone');

    fileInput.addEventListener('change', () => {
      if (fileInput.files.length > 0) {
        filePreview.textContent = 'Terpilih: ' + fileInput.files[0].name;
        filePreview.style.display = 'block';
      }
    });

    ['dragover', 'dragenter'].forEach(evt => {
      uploadZone.addEventListener(evt, (e) => {
        e.preventDefault();
        uploadZone.classList.add('dragover');
      });
    });

    ['dragleave', 'drop'].forEach(evt => {
      uploadZone.addEventListener(evt, (e) => {
        e.preventDefault();
        uploadZone.classList.remove('dragover');
      });
    });

    uploadZone.addEventListener('drop', (e) => {
      if (e.dataTransfer.files.length > 0) {
        fileInput.files = e.dataTransfer.files;
        filePreview.textContent = 'Terpilih: ' + e.dataTransfer.files[0].name;
        filePreview.style.display = 'block';
      }
    });

    document.getElementById('reportForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const lokasi = document.querySelector('input[name="lokasi"]:checked');
      if (!lokasi) {
        alert('Silakan pilih lokasi TPS.');
        return;
      }
      if (textarea.value.length < 20) {
        alert('Deskripsi minimal 20 karakter.');
        return;
      }
      alert('Laporan siap dikirim ke server.');
    });
  </script>

</body>
</html>