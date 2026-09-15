<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Kelola Laporan Masyarakat</title>
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

  .layout {
    display: flex;
    min-height: 100vh;
  }

  /* ===== SIDEBAR ===== */
  .sidebar {
    width: 250px;
    flex-shrink: 0;
    background: #0d2b21;
    color: #ffffff;
    display: flex;
    flex-direction: column;
    padding: 22px 18px;
  }

  .sidebar-brand {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 800;
    font-size: 1.05rem;
    margin-bottom: 22px;
    padding: 0 6px;
  }

  .sidebar-logo {
    width: 28px;
    height: 28px;
    background: #1eb980;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .sidebar-logo svg {
    width: 15px;
    height: 15px;
    stroke: #ffffff;
    fill: none;
    stroke-width: 2.2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .org-box {
    background: rgba(255, 255, 255, 0.06);
    border-radius: 10px;
    padding: 12px 14px;
    margin-bottom: 22px;
  }

  .org-label {
    font-size: 0.68rem;
    letter-spacing: 0.04em;
    color: #9ec9b6;
    margin-bottom: 3px;
  }

  .org-name {
    font-size: 0.9rem;
    font-weight: 700;
  }

  .nav-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 4px;
    flex: 1;
  }

  .nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 11px 14px;
    border-radius: 9px;
    color: #b7d9c8;
    text-decoration: none;
    font-size: 0.88rem;
    font-weight: 500;
    position: relative;
  }

  .nav-item svg {
    width: 17px;
    height: 17px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2;
    flex-shrink: 0;
  }

  .nav-item.active {
    background: #1eb980;
    color: #ffffff;
    font-weight: 700;
  }

  .nav-item:hover:not(.active) {
    background: rgba(255, 255, 255, 0.06);
    color: #ffffff;
  }

  .nav-badge {
    margin-left: auto;
    background: #ef4444;
    color: #ffffff;
    font-size: 0.7rem;
    font-weight: 700;
    padding: 1px 7px;
    border-radius: 999px;
  }

  .sidebar-footer {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 16px;
    margin-top: 16px;
  }

  .footer-label {
    font-size: 0.7rem;
    color: #9ec9b6;
    margin-bottom: 3px;
  }

  .footer-name {
    font-size: 0.88rem;
    font-weight: 700;
    margin-bottom: 12px;
  }

  .logout-link {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #f3a5a5;
    text-decoration: none;
    font-size: 0.85rem;
    font-weight: 600;
  }

  .logout-link svg {
    width: 15px;
    height: 15px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2;
  }

  /* ===== CONTENT ===== */
  .content {
    flex: 1;
    padding: 24px 32px 40px;
    min-width: 0;
  }

  .topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 12px;
  }

  .topbar-title {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.15rem;
    font-weight: 800;
    color: #111827;
  }

  .topbar-title svg {
    width: 19px;
    height: 19px;
    stroke: #374151;
    fill: none;
    stroke-width: 2;
  }

  .topbar-right {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .date-chip {
    display: flex;
    align-items: center;
    gap: 7px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 7px 13px;
    font-size: 0.82rem;
    color: #374151;
    font-weight: 500;
  }

  .date-chip svg {
    width: 15px;
    height: 15px;
    stroke: #6b7280;
    fill: none;
    stroke-width: 2;
  }

  .alert-chip {
    display: flex;
    align-items: center;
    gap: 6px;
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #dc2626;
    border-radius: 8px;
    padding: 7px 13px;
    font-size: 0.82rem;
    font-weight: 700;
  }

  .alert-chip svg {
    width: 14px;
    height: 14px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2;
  }

  /* FILTER BAR */
  .filter-bar {
    display: flex;
    gap: 12px;
    margin-bottom: 18px;
  }

  .search-box {
    flex: 1;
    display: flex;
    align-items: center;
    gap: 10px;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 9px;
    padding: 11px 16px;
  }

  .search-box svg {
    width: 16px;
    height: 16px;
    stroke: #9ca3af;
    fill: none;
    stroke-width: 2;
    flex-shrink: 0;
  }

  .search-box input {
    border: none;
    outline: none;
    width: 100%;
    font-size: 0.88rem;
    color: #111827;
    background: transparent;
  }

  .search-box input::placeholder {
    color: #9ca3af;
  }

  .status-select {
    position: relative;
  }

  .status-select select {
    appearance: none;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 9px;
    padding: 11px 36px 11px 16px;
    font-size: 0.88rem;
    color: #374151;
    font-weight: 500;
    cursor: pointer;
    min-width: 170px;
  }

  .status-select svg {
    position: absolute;
    right: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 14px;
    height: 14px;
    stroke: #6b7280;
    fill: none;
    stroke-width: 2;
    pointer-events: none;
  }

  /* TABLE */
  .table-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    overflow: hidden;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  thead th {
    text-align: left;
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    color: #9ca3af;
    font-weight: 700;
    padding: 14px 20px;
    border-bottom: 1px solid #e5e7eb;
    background: #fafbfc;
    white-space: nowrap;
  }

  tbody td {
    padding: 15px 20px;
    font-size: 0.86rem;
    color: #374151;
    border-bottom: 1px solid #f1f2f4;
    vertical-align: top;
  }

  tbody tr:last-child td {
    border-bottom: none;
  }

  tbody tr:hover {
    background: #fafffc;
  }

  .id-cell {
    font-weight: 700;
    color: #0f7a4e;
    white-space: nowrap;
  }

  .date-cell {
    color: #6b7280;
    white-space: nowrap;
  }

  .pelapor-cell {
    font-weight: 600;
    color: #111827;
    white-space: nowrap;
  }

  .lokasi-cell {
    font-weight: 600;
    color: #111827;
    white-space: nowrap;
  }

  .desc-cell {
    max-width: 260px;
    color: #6b7280;
    line-height: 1.4;
  }

  .status-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 999px;
    white-space: nowrap;
  }

  .status-pill::before {
    content: "";
    width: 7px;
    height: 7px;
    border-radius: 50%;
    flex-shrink: 0;
  }

  .status-dijadwalkan {
    color: #2563eb;
    background: #eaf1fe;
  }
  .status-dijadwalkan::before { background: #2563eb; }

  .status-menunggu {
    color: #6b7280;
    background: #f1f2f4;
  }
  .status-menunggu::before { background: #9ca3af; }

  .status-selesai {
    color: #16a34a;
    background: #eafcf1;
  }
  .status-selesai::before { background: #16a34a; }

  .action-btn {
    border: none;
    border-radius: 7px;
    padding: 8px 16px;
    font-size: 0.8rem;
    font-weight: 700;
    cursor: pointer;
    white-space: nowrap;
  }

  .action-btn.validasi {
    background: #f5a623;
    color: #ffffff;
  }
  .action-btn.validasi:hover { background: #e0941a; }

  .action-btn.jadwalkan {
    background: #0f5c3f;
    color: #ffffff;
  }
  .action-btn.jadwalkan:hover { background: #0c4a33; }

  .done-label {
    color: #16a34a;
    font-weight: 700;
    font-size: 0.82rem;
  }

  @media (max-width: 760px) {
    .sidebar { display: none; }
    .table-card { overflow-x: auto; }
    table { min-width: 900px; }
  }
</style>
</head>
<body>

<div class="layout">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="sidebar-logo">
        <svg viewBox="0 0 24 24"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>
      </div>
      EcoTrack
    </div>

    <div class="org-box">
      <div class="org-label">DINAS KEBERSIHAN</div>
      <div class="org-name">Kota Madiun</div>
    </div>

    <ul class="nav-list">
      <li>
        <a href="admin-dashboard-ecotrack.html" class="nav-item">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-item active">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/></svg>
          Laporan Masuk
          <span class="nav-badge">3</span>
        </a>
      </li>
      <li>
        <a href="#" class="nav-item">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          Jadwal Pengangkutan
        </a>
      </li>
      <li>
        <a href="#" class="nav-item">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          Data Petugas
        </a>
      </li>
    </ul>

    <div class="sidebar-footer">
      <div class="footer-label">Masuk sebagai</div>
      <div class="footer-name">Ir. Ahmad Fauzi</div>
      <a href="login-ecotrack.html" class="logout-link">
        <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
        Keluar
      </a>
    </div>
  </aside>

  <!-- CONTENT -->
  <main class="content">

    <div class="topbar">
      <div class="topbar-title">
        <svg viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 15l4-6 4 4 5-8"/></svg>
        Kelola Laporan Masyarakat
      </div>
      <div class="topbar-right">
        <div class="date-chip">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          Senin, 01 Juni 2026
        </div>
        <div class="alert-chip">
          <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
          2 TPS Kritis
        </div>
      </div>
    </div>

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
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="reportTableBody">
          <tr data-status="dijadwalkan" data-search="rpt001 budi santoso tps taman kota">
            <td class="id-cell">RPT001</td>
            <td class="date-cell">2026-05-31 14:20</td>
            <td class="pelapor-cell">Budi Santoso</td>
            <td class="lokasi-cell">TPS Taman Kota</td>
            <td class="desc-cell">Sampah menumpuk dan berbau tidak sedap, sudah 2 hari belum...</td>
            <td><span class="status-pill status-dijadwalkan">Dijadwalkan</span></td>
            <td><button class="action-btn validasi">Validasi</button></td>
          </tr>
          <tr data-status="menunggu" data-search="rpt002 budi santoso tps nambangan">
            <td class="id-cell">RPT002</td>
            <td class="date-cell">2026-06-01 07:45</td>
            <td class="pelapor-cell">Budi Santoso</td>
            <td class="lokasi-cell">TPS Nambangan</td>
            <td class="desc-cell">TPS penuh total, sampah meluber ke jalan dan mengganggu pejalan...</td>
            <td><span class="status-pill status-menunggu">Menunggu</span></td>
            <td><button class="action-btn jadwalkan">Jadwalkan</button></td>
          </tr>
          <tr data-status="menunggu" data-search="rpt005 siti rahayu tps nambangan">
            <td class="id-cell">RPT005</td>
            <td class="date-cell">2026-06-01 09:30</td>
            <td class="pelapor-cell">Siti Rahayu</td>
            <td class="lokasi-cell">TPS Nambangan</td>
            <td class="desc-cell">TPS penuh dan meluber ke jalan masuk perumahan. Perlu...</td>
            <td><span class="status-pill status-menunggu">Menunggu</span></td>
            <td><button class="action-btn jadwalkan">Jadwalkan</button></td>
          </tr>
          <tr data-status="menunggu" data-search="rpt006 siti rahayu tps oro-oro ombo">
            <td class="id-cell">RPT006</td>
            <td class="date-cell">2026-06-01 10:15</td>
            <td class="pelapor-cell">Siti Rahayu</td>
            <td class="lokasi-cell">TPS Oro-Oro Ombo</td>
            <td class="desc-cell">Sampah organik mulai membusuk, perlu segera diangkut.</td>
            <td><span class="status-pill status-menunggu">Menunggu</span></td>
            <td><button class="action-btn jadwalkan">Jadwalkan</button></td>
          </tr>
          <tr data-status="dijadwalkan" data-search="rpt007 siti rahayu tps pasar besar">
            <td class="id-cell">RPT007</td>
            <td class="date-cell">2026-05-30 08:00</td>
            <td class="pelapor-cell">Siti Rahayu</td>
            <td class="lokasi-cell">TPS Pasar Besar</td>
            <td class="desc-cell">Volume sampah naik signifikan pasca hari raya.</td>
            <td><span class="status-pill status-dijadwalkan">Dijadwalkan</span></td>
            <td><button class="action-btn validasi">Validasi</button></td>
          </tr>
          <tr data-status="selesai" data-search="rpt003 budi santoso tps pasar besar">
            <td class="id-cell">RPT003</td>
            <td class="date-cell">2026-05-28 10:00</td>
            <td class="pelapor-cell">Budi Santoso</td>
            <td class="lokasi-cell">TPS Pasar Besar</td>
            <td class="desc-cell">Keterlambatan pengangkutan lebih dari 3 hari. Banyak lalat di sekitar...</td>
            <td><span class="status-pill status-selesai">Selesai</span></td>
            <td><span class="done-label">✓ Selesai</span></td>
          </tr>
        </tbody>
      </table>
    </div>

  </main>

</div>

<script>
  const searchInput = document.getElementById('searchInput');
  const statusFilter = document.getElementById('statusFilter');
  const rows = document.querySelectorAll('#reportTableBody tr');

  function applyFilters() {
    const query = searchInput.value.trim().toLowerCase();
    const status = statusFilter.value;

    rows.forEach(row => {
      const matchesSearch = row.dataset.search.includes(query);
      const matchesStatus = status === 'semua' || row.dataset.status === status;
      row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
    });
  }

  searchInput.addEventListener('input', applyFilters);
  statusFilter.addEventListener('change', applyFilters);
</script>

</body>
</html>