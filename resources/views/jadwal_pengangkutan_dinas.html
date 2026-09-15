<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Jadwal Pengangkutan</title>
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

  /* STAT CARDS */
  .stat-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 20px;
  }

  .stat-card {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 16px 20px;
  }

  .stat-value {
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: 4px;
  }

  .stat-value.green { color: #16a34a; }
  .stat-value.blue { color: #2563eb; }
  .stat-value.orange { color: #ea580c; }
  .stat-value.gray { color: #6b7280; }

  .stat-title {
    font-size: 0.82rem;
    color: #6b7280;
    font-weight: 600;
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

  .btn-new {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #0f5c3f;
    color: #ffffff;
    border: none;
    border-radius: 9px;
    padding: 0 20px;
    font-size: 0.88rem;
    font-weight: 700;
    cursor: pointer;
    white-space: nowrap;
  }

  .btn-new:hover {
    background: #0c4a33;
  }

  .btn-new svg {
    width: 15px;
    height: 15px;
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
    vertical-align: middle;
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

  .datetime-cell {
    color: #374151;
    white-space: nowrap;
  }

  .datetime-cell .time {
    color: #9ca3af;
    font-size: 0.78rem;
    display: block;
  }

  .lokasi-cell {
    font-weight: 600;
    color: #111827;
    white-space: nowrap;
  }

  .petugas-cell {
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
  }

  .petugas-avatar {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: #e5f7ee;
    color: #0f7a4e;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.72rem;
    font-weight: 700;
    flex-shrink: 0;
  }

  .kendaraan-cell {
    color: #6b7280;
    white-space: nowrap;
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

  .status-terjadwal {
    color: #2563eb;
    background: #eaf1fe;
  }
  .status-terjadwal::before { background: #2563eb; }

  .status-berjalan {
    color: #ea580c;
    background: #fff2e8;
  }
  .status-berjalan::before { background: #ea580c; }

  .status-selesai {
    color: #16a34a;
    background: #eafcf1;
  }
  .status-selesai::before { background: #16a34a; }

  .status-batal {
    color: #6b7280;
    background: #f1f2f4;
  }
  .status-batal::before { background: #9ca3af; }

  .detail-link {
    color: #0f7a4e;
    font-weight: 600;
    text-decoration: none;
    font-size: 0.85rem;
    white-space: nowrap;
  }

  .detail-link:hover {
    text-decoration: underline;
  }

  @media (max-width: 960px) {
    .stat-grid { grid-template-columns: repeat(2, 1fr); }
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
        <a href="kelola-laporan-ecotrack.html" class="nav-item">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/></svg>
          Laporan Masuk
          <span class="nav-badge">3</span>
        </a>
      </li>
      <li>
        <a href="#" class="nav-item active">
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
        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
        Jadwal Pengangkutan
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

    <!-- STAT CARDS -->
    <div class="stat-grid">
      <div class="stat-card">
        <div class="stat-value blue">5</div>
        <div class="stat-title">Jadwal Hari Ini</div>
      </div>
      <div class="stat-card">
        <div class="stat-value orange">1</div>
        <div class="stat-title">Sedang Berjalan</div>
      </div>
      <div class="stat-card">
        <div class="stat-value green">3</div>
        <div class="stat-title">Selesai</div>
      </div>
      <div class="stat-card">
        <div class="stat-value gray">1</div>
        <div class="stat-title">Dibatalkan</div>
      </div>
    </div>

    <!-- FILTER -->
    <div class="filter-bar">
      <div class="search-box">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <input type="text" id="searchInput" placeholder="Cari berdasarkan TPS atau petugas...">
      </div>
      <div class="status-select">
        <select id="statusFilter">
          <option value="semua">Semua Status</option>
          <option value="terjadwal">Terjadwal</option>
          <option value="berjalan">Sedang Berjalan</option>
          <option value="selesai">Selesai</option>
          <option value="batal">Dibatalkan</option>
        </select>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
      </div>
      <button class="btn-new">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Buat Jadwal
      </button>
    </div>

    <!-- TABLE -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>ID Jadwal</th>
            <th>Tanggal &amp; Waktu</th>
            <th>Lokasi TPS</th>
            <th>Petugas</th>
            <th>Kendaraan</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="scheduleTableBody">
          <tr data-status="berjalan" data-search="jdw001 tps taman kota agus widodo">
            <td class="id-cell">JDW001</td>
            <td class="datetime-cell">01 Jun 2026<span class="time">09:00</span></td>
            <td class="lokasi-cell">TPS Taman Kota</td>
            <td class="petugas-cell"><span class="petugas-avatar">A</span>Agus Widodo</td>
            <td class="kendaraan-cell">Truk B 9012 KA</td>
            <td><span class="status-pill status-berjalan">Sedang Berjalan</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="terjadwal" data-search="jdw002 tps nambangan agus widodo">
            <td class="id-cell">JDW002</td>
            <td class="datetime-cell">01 Jun 2026<span class="time">11:00</span></td>
            <td class="lokasi-cell">TPS Nambangan</td>
            <td class="petugas-cell"><span class="petugas-avatar">A</span>Agus Widodo</td>
            <td class="kendaraan-cell">Truk B 9012 KA</td>
            <td><span class="status-pill status-terjadwal">Terjadwal</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="terjadwal" data-search="jdw003 tps oro-oro ombo dedi kurniawan">
            <td class="id-cell">JDW003</td>
            <td class="datetime-cell">01 Jun 2026<span class="time">13:30</span></td>
            <td class="lokasi-cell">TPS Oro-Oro Ombo</td>
            <td class="petugas-cell"><span class="petugas-avatar">D</span>Dedi Kurniawan</td>
            <td class="kendaraan-cell">Truk B 4471 AB</td>
            <td><span class="status-pill status-terjadwal">Terjadwal</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="selesai" data-search="jdw004 tps pasar besar dedi kurniawan">
            <td class="id-cell">JDW004</td>
            <td class="datetime-cell">31 Mei 2026<span class="time">08:00</span></td>
            <td class="lokasi-cell">TPS Pasar Besar</td>
            <td class="petugas-cell"><span class="petugas-avatar">D</span>Dedi Kurniawan</td>
            <td class="kendaraan-cell">Truk B 4471 AB</td>
            <td><span class="status-pill status-selesai">Selesai</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="selesai" data-search="jdw005 tps pandean rina wulandari">
            <td class="id-cell">JDW005</td>
            <td class="datetime-cell">31 Mei 2026<span class="time">10:15</span></td>
            <td class="lokasi-cell">TPS Pandean</td>
            <td class="petugas-cell"><span class="petugas-avatar">R</span>Rina Wulandari</td>
            <td class="kendaraan-cell">Truk B 7723 CD</td>
            <td><span class="status-pill status-selesai">Selesai</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="batal" data-search="jdw006 tps kejuron rina wulandari">
            <td class="id-cell">JDW006</td>
            <td class="datetime-cell">30 Mei 2026<span class="time">14:00</span></td>
            <td class="lokasi-cell">TPS Kejuron</td>
            <td class="petugas-cell"><span class="petugas-avatar">R</span>Rina Wulandari</td>
            <td class="kendaraan-cell">Truk B 7723 CD</td>
            <td><span class="status-pill status-batal">Dibatalkan</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
        </tbody>
      </table>
    </div>

  </main>

</div>

<script>
  const searchInput = document.getElementById('searchInput');
  const statusFilter = document.getElementById('statusFilter');
  const rows = document.querySelectorAll('#scheduleTableBody tr');

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