<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Detail Tugas Pengangkutan</title>
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

  /* ===== PAGE ===== */
  .page-title {
    padding: 26px 32px 0;
    font-size: 1.3rem;
    font-weight: 800;
  }

  .grid-top {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    gap: 18px;
    padding: 18px 32px 0;
  }

  .card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06);
  }

  .card-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 700;
    font-size: 0.98rem;
    margin-bottom: 14px;
  }

  .card-title svg { width: 16px; height: 16px; stroke: #374151; fill: none; stroke-width: 2; }

  .priority-banner {
    display: flex;
    align-items: center;
    gap: 6px;
    background: #fee2e2;
    color: #dc2626;
    font-size: 0.82rem;
    font-weight: 700;
    padding: 8px 12px;
    border-radius: 8px;
    margin-bottom: 14px;
  }

  .priority-banner svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; }

  .info-row {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-size: 0.88rem;
    color: #374151;
    margin-bottom: 10px;
  }

  .info-row svg { width: 15px; height: 15px; stroke: #6b7280; fill: none; stroke-width: 2; margin-top: 1px; flex-shrink: 0; }

  .info-label { color: #6b7280; margin-right: 4px; }

  .capacity-bar-wrap {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 12px 0;
  }

  .capacity-bar-track {
    flex: 1;
    height: 8px;
    background: #e5e7eb;
    border-radius: 6px;
    overflow: hidden;
  }

  .capacity-bar-fill {
    height: 100%;
    background: #dc2626;
    border-radius: 6px;
  }

  .capacity-value { font-size: 0.85rem; font-weight: 700; color: #dc2626; }

  .instruksi-box {
    background: #fef9c3;
    border-left: 3px solid #eab308;
    border-radius: 8px;
    padding: 12px 14px;
    margin-top: 8px;
  }

  .instruksi-label {
    color: #92400e;
    font-weight: 700;
    font-size: 0.8rem;
    margin-bottom: 4px;
  }

  .instruksi-text { color: #78350f; font-size: 0.85rem; }

  /* Map placeholder */
  .map-box {
    height: 180px;
    background: #eaf3ee;
    border-radius: 10px;
    position: relative;
    overflow: hidden;
  }

  .map-legend {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(255,255,255,0.9);
    border-radius: 8px;
    padding: 8px 10px;
    font-size: 0.75rem;
  }

  .map-legend div { display: flex; align-items: center; gap: 6px; margin-bottom: 4px; }
  .map-legend div:last-child { margin-bottom: 0; }

  .dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; }
  .dot.green { background: #16a34a; }
  .dot.orange { background: #f59e0b; }
  .dot.red { background: #dc2626; }

  .map-pin {
    position: absolute;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px rgba(0,0,0,0.05);
  }

  /* ===== TABS ===== */
  .tabs-wrap {
    display: flex;
    padding: 22px 32px 0;
    border-bottom: 1px solid #e5e7eb;
    margin-top: 18px;
    gap: 24px;
  }

  .tab-item {
    padding: 10px 4px;
    font-size: 0.9rem;
    font-weight: 700;
    color: #9ca3af;
    cursor: pointer;
    border-bottom: 2px solid transparent;
  }

  .tab-item.active {
    color: #16a34a;
    border-bottom-color: #16a34a;
  }

  /* ===== STATUS PANEL ===== */
  .status-panel {
    padding: 20px 32px 32px;
  }

  .status-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-bottom: 18px;
  }

  .status-box {
    background: #fff;
    border-radius: 10px;
    padding: 14px 16px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06);
  }

  .status-box-label {
    font-size: 0.75rem;
    color: #6b7280;
    font-weight: 700;
    letter-spacing: 0.02em;
    margin-bottom: 6px;
  }

  .status-box-value { font-size: 0.95rem; font-weight: 700; }
  .status-box-value.proses { color: #2563eb; }
  .status-box-value.mendesak { color: #dc2626; }

  .btn-update {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    background: #16a34a;
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 14px;
    font-size: 0.95rem;
    font-weight: 700;
    cursor: pointer;
  }

  /* ===== UPDATE STATUS PANEL ===== */
  .update-label {
    font-size: 0.9rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 10px;
  }

  .update-label.with-icon {
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .update-label svg { width: 15px; height: 15px; stroke: #111827; fill: none; stroke-width: 2; }

  .status-toggle-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 22px;
  }

  .status-toggle {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 13px;
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    background: #fff;
    color: #6b7280;
    font-weight: 700;
    font-size: 0.88rem;
    cursor: pointer;
  }

  .status-toggle svg { width: 16px; height: 16px; stroke: currentColor; fill: none; stroke-width: 2; }

  .status-toggle.active {
    border-color: #2563eb;
    background: #eff6ff;
    color: #2563eb;
  }

  .upload-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 4px;
    border: 1.5px dashed #d1d5db;
    border-radius: 12px;
    background: #f9fafb;
    padding: 34px 20px;
    margin-bottom: 22px;
    cursor: pointer;
    text-align: center;
  }

  .upload-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: #dcfce7;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 8px;
  }

  .upload-icon svg { width: 18px; height: 18px; stroke: #16a34a; fill: none; stroke-width: 2.2; }

  .upload-title { font-weight: 700; font-size: 0.92rem; color: #111827; }
  .upload-sub { font-size: 0.82rem; color: #6b7280; }

  .catatan-textarea {
    width: 100%;
    min-height: 90px;
    resize: vertical;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    padding: 12px 14px;
    font-size: 0.88rem;
    font-family: inherit;
    margin-bottom: 22px;
  }

  .catatan-textarea:focus { outline: none; border-color: #16a34a; }

  .btn-kirim {
    display: block;
    width: 100%;
    background: #15803d;
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 15px;
    font-size: 0.95rem;
    font-weight: 700;
    cursor: pointer;
  }

  @media (max-width: 800px) {
    .grid-top { grid-template-columns: 1fr; }
    .status-grid { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <a href="{{ route('beranda.petugas') }}" class="back-link">
      <svg viewBox="0 0 24 24"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
      Kembali
    </a>
    <div class="nav-logo">
      <svg viewBox="0 0 24 24"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.9.66c.38-1 1.9-4.5 3.9-6.5C11 15 14 15 17 12c2.5-2.5 3-7 3-7s-4.5-.5-3 3Z"/></svg>
    </div>
    <span class="nav-brand">EcoTrack</span>
  </nav>

  <div class="page-title">Detail Tugas Pengangkutan</div>

  <div class="grid-top">
    <!-- INFORMASI TUGAS -->
    <div class="card">
      <div class="card-title">
        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg>
        Informasi Tugas
      </div>

      <div class="priority-banner">
        <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
        Prioritas Mendesak
      </div>

      <div class="info-row">
        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg>
        <span><span class="info-label">TPS Target:</span> <strong>{{ $tps_target }}</strong></span>
      </div>
      <div class="info-row">
        <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
        <span><span class="info-label">Alamat:</span> {{ $alamat }}</span>
      </div>
      <div class="info-row">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        <span><span class="info-label">Jadwal:</span> {{ $tanggal }} - {{ $jam }} WIB</span>
      </div>

      <div class="capacity-bar-wrap">
        <div class="capacity-bar-track">
          <div class="capacity-bar-fill" style="width: {{ $kapasitas }}%;"></div>
        </div>
        <span class="capacity-value">{{ $kapasitas }}%</span>
      </div>

      <div class="instruksi-box">
        <div class="instruksi-label">INSTRUKSI DINAS</div>
        <div class="instruksi-text">{{ $instruksi }}</div>
      </div>
    </div>

    <!-- LOKASI TPS -->
    <div class="card">
      <div class="card-title">
        <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
        Lokasi TPS
      </div>
      <div class="map-box">
        <div class="map-legend">
          <div><span class="dot green"></span> Aman (&lt; 50%)</div>
          <div><span class="dot orange"></span> Sedang (50-79%)</div>
          <div><span class="dot red"></span> Kritis (&ge; 80%)</div>
        </div>
        <div class="map-pin" style="background:#16a34a; top: 40px; left: 30px;"></div>
        <div class="map-pin" style="background:#f59e0b; top: 70px; left: 130px;"></div>
        <div class="map-pin" style="background:#dc2626; top: 90px; left: 170px;"></div>
        <div class="map-pin" style="background:#16a34a; top: 130px; left: 90px;"></div>
      </div>
    </div>
  </div>

  <!-- TABS -->
  <div class="tabs-wrap">
    <div id="tab-detail" class="tab-item active" onclick="gantiTabDetail('detail')">Detail Tugas</div>
    <div id="tab-update" class="tab-item" onclick="gantiTabDetail('update')">Update Status</div>
  </div>

  <!-- PANEL: DETAIL TUGAS -->
  <div id="panel-detail-tugas" class="status-panel">
    <div class="status-grid">
      <div class="status-box">
        <div class="status-box-label">STATUS SAAT INI</div>
        <div class="status-box-value proses">{{ $status_saat_ini }}</div>
      </div>
      <div class="status-box">
        <div class="status-box-label">ID JADWAL</div>
        <div class="status-box-value">{{ $id_jadwal }}</div>
      </div>
      <div class="status-box">
        <div class="status-box-label">JENIS TUGAS</div>
        <div class="status-box-value mendesak">⚠ {{ $jenis_tugas }}</div>
      </div>
    </div>

    <button class="btn-update" type="button" onclick="gantiTabDetail('update')">
      Mulai Update Status
      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
    </button>
  </div>

  <!-- PANEL: UPDATE STATUS -->
  <div id="panel-update-status" class="status-panel" style="display:none;">
    <div class="update-label">Status Pengangkutan</div>
    <div class="status-toggle-row">
      <button type="button" id="toggle-mulai" class="status-toggle active" onclick="pilihStatusPengangkutan('mulai')">
        <svg viewBox="0 0 24 24"><path d="M14 18V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h1"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62L19 8h-4"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
        Mulai Pengangkutan
      </button>
      <button type="button" id="toggle-selesai" class="status-toggle" onclick="pilihStatusPengangkutan('selesai')">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
        Selesai Diangkut
      </button>
    </div>

    <div class="update-label with-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3Z"/><circle cx="12" cy="13" r="3"/></svg>
      Foto Bukti Pengangkutan
    </div>
    <label class="upload-box" for="foto-bukti-input">
      <input type="file" id="foto-bukti-input" accept="image/*" style="display:none;" onchange="fotoBuktiDipilih(this)">
      <div class="upload-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 16V4M6 10l6-6 6 6"/><path d="M4 20h16"/></svg>
      </div>
      <div class="upload-title">Unggah Foto Bukti</div>
      <div class="upload-sub" id="foto-bukti-sub">Foto kondisi TPS setelah diangkut</div>
    </label>

    <div class="update-label">Catatan Lapangan</div>
    <textarea class="catatan-textarea" placeholder="Catatan kondisi lapangan, kendala, atau informasi tambahan..."></textarea>

    <button class="btn-kirim" type="button">Kirim Laporan Status Selesai Ke Dinas</button>
  </div>
  <script>
    function gantiTabDetail(tab) {
      const panelDetail = document.getElementById('panel-detail-tugas');
      const panelUpdate = document.getElementById('panel-update-status');
      const tabDetail = document.getElementById('tab-detail');
      const tabUpdate = document.getElementById('tab-update');

      if (tab === 'detail') {
        panelDetail.style.display = 'block';
        panelUpdate.style.display = 'none';
        tabDetail.classList.add('active');
        tabUpdate.classList.remove('active');
      } else {
        panelDetail.style.display = 'none';
        panelUpdate.style.display = 'block';
        tabUpdate.classList.add('active');
        tabDetail.classList.remove('active');
      }
    }

    function pilihStatusPengangkutan(status) {
      const btnMulai = document.getElementById('toggle-mulai');
      const btnSelesai = document.getElementById('toggle-selesai');

      if (status === 'mulai') {
        btnMulai.classList.add('active');
        btnSelesai.classList.remove('active');
      } else {
        btnSelesai.classList.add('active');
        btnMulai.classList.remove('active');
      }
    }

    function fotoBuktiDipilih(input) {
      const sub = document.getElementById('foto-bukti-sub');
      if (input.files && input.files.length > 0) {
        sub.textContent = input.files[0].name;
      }
    }
  </script>

</body>
</html>