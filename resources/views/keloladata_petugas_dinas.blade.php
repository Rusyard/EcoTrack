<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Data Petugas</title>
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

  .petugas-cell {
    display: flex;
    align-items: center;
    gap: 10px;
    white-space: nowrap;
  }

  .petugas-avatar {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: #e5f7ee;
    color: #0f7a4e;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 700;
    flex-shrink: 0;
  }

  .petugas-name {
    font-weight: 700;
    color: #111827;
  }

  .petugas-role {
    font-size: 0.76rem;
    color: #9ca3af;
  }

  .nip-cell {
    color: #6b7280;
    white-space: nowrap;
  }

  .wilayah-cell {
    font-weight: 600;
    color: #111827;
    white-space: nowrap;
  }

  .kontak-cell {
    color: #6b7280;
    white-space: nowrap;
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

  .status-aktif {
    color: #16a34a;
    background: #eafcf1;
  }
  .status-aktif::before { background: #16a34a; }

  .status-bertugas {
    color: #2563eb;
    background: #eaf1fe;
  }
  .status-bertugas::before { background: #2563eb; }

  .status-cuti {
    color: #ea580c;
    background: #fff2e8;
  }
  .status-cuti::before { background: #ea580c; }

  .status-nonaktif {
    color: #6b7280;
    background: #f1f2f4;
  }
  .status-nonaktif::before { background: #9ca3af; }

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
        <a href="{{ route('beranda.dinas') }}" class="nav-item">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('laporan.masuk.dinas') }}" class="nav-item">
          <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/></svg>
          Laporan Masuk
          <span class="nav-badge">3</span>
        </a>
      </li>
      <li>
        <a href="{{ route('jadwal.pengangkutan.dinas') }}" class="nav-item">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          Jadwal Pengangkutan
        </a>
      </li>
      <li>
        <a href="{{ route('keloladata.petugas.dinas') }}" class="nav-item active">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          Data Petugas
        </a>
      </li>
    </ul>

    <div class="sidebar-footer">
        <div class="footer-label">Masuk sebagai</div>
        <div class="footer-name">{{ Auth::user()->nama_lengkap }}</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-link" style="background: none; border: none; padding: 0; cursor: pointer;">
                <svg viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><path d="M16 17l5-5-5-5"/><path d="M21 12H9"/></svg>
                Keluar
            </button>
        </form>
    </div>
  </aside>

  <!-- CONTENT -->
  <main class="content">

    <div class="topbar">
      <div class="topbar-title">
        <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        Data Petugas
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
        <div class="stat-value blue">8</div>
        <div class="stat-title">Total Petugas</div>
      </div>
      <div class="stat-card">
        <div class="stat-value green">3</div>
        <div class="stat-title">Sedang Bertugas</div>
      </div>
      <div class="stat-card">
        <div class="stat-value orange">1</div>
        <div class="stat-title">Cuti</div>
      </div>
      <div class="stat-card">
        <div class="stat-value gray">1</div>
        <div class="stat-title">Nonaktif</div>
      </div>
    </div>

    <!-- FILTER -->
    <div class="filter-bar">
      <div class="search-box">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <input type="text" id="searchInput" placeholder="Cari berdasarkan nama atau NIP...">
      </div>
      <div class="status-select">
        <select id="statusFilter">
          <option value="semua">Semua Status</option>
          <option value="aktif">Aktif</option>
          <option value="bertugas">Sedang Bertugas</option>
          <option value="cuti">Cuti</option>
          <option value="nonaktif">Nonaktif</option>
        </select>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
      </div>
      <button class="btn-new">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Tambah Petugas
      </button>
    </div>

    <!-- TABLE -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>Petugas</th>
            <th>NIP</th>
            <th>Wilayah Tugas</th>
            <th>Kontak</th>
            <th>Kendaraan</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="petugasTableBody">
          <tr data-status="bertugas" data-search="agus widodo 19870512001 kartoharjo">
            <td>
              <div class="petugas-cell">
                <span class="petugas-avatar">A</span>
                <div>
                  <div class="petugas-name">Agus Widodo</div>
                  <div class="petugas-role">Petugas Lapangan</div>
                </div>
              </div>
            </td>
            <td class="nip-cell">19870512001</td>
            <td class="wilayah-cell">Kartoharjo</td>
            <td class="kontak-cell">0812-3456-7801</td>
            <td class="kendaraan-cell">Truk B 9012 KA</td>
            <td><span class="status-pill status-bertugas">Sedang Bertugas</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="bertugas" data-search="dedi kurniawan 19900823002 manguharjo">
            <td>
              <div class="petugas-cell">
                <span class="petugas-avatar">D</span>
                <div>
                  <div class="petugas-name">Dedi Kurniawan</div>
                  <div class="petugas-role">Petugas Lapangan</div>
                </div>
              </div>
            </td>
            <td class="nip-cell">19900823002</td>
            <td class="wilayah-cell">Manguharjo</td>
            <td class="kontak-cell">0813-2211-9087</td>
            <td class="kendaraan-cell">Truk B 4471 AB</td>
            <td><span class="status-pill status-bertugas">Sedang Bertugas</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="aktif" data-search="rina wulandari 19921107003 taman">
            <td>
              <div class="petugas-cell">
                <span class="petugas-avatar">R</span>
                <div>
                  <div class="petugas-name">Rina Wulandari</div>
                  <div class="petugas-role">Petugas Lapangan</div>
                </div>
              </div>
            </td>
            <td class="nip-cell">19921107003</td>
            <td class="wilayah-cell">Taman</td>
            <td class="kontak-cell">0857-6634-2210</td>
            <td class="kendaraan-cell">Truk B 7723 CD</td>
            <td><span class="status-pill status-bertugas">Sedang Bertugas</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="aktif" data-search="bambang setiawan 19880314004 kartoharjo">
            <td>
              <div class="petugas-cell">
                <span class="petugas-avatar">B</span>
                <div>
                  <div class="petugas-name">Bambang Setiawan</div>
                  <div class="petugas-role">Petugas Lapangan</div>
                </div>
              </div>
            </td>
            <td class="nip-cell">19880314004</td>
            <td class="wilayah-cell">Kartoharjo</td>
            <td class="kontak-cell">0821-4432-6650</td>
            <td class="kendaraan-cell">Truk B 2290 EF</td>
            <td><span class="status-pill status-aktif">Aktif</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="cuti" data-search="yuli astuti 19950602005 manguharjo">
            <td>
              <div class="petugas-cell">
                <span class="petugas-avatar">Y</span>
                <div>
                  <div class="petugas-name">Yuli Astuti</div>
                  <div class="petugas-role">Petugas Lapangan</div>
                </div>
              </div>
            </td>
            <td class="nip-cell">19950602005</td>
            <td class="wilayah-cell">Manguharjo</td>
            <td class="kontak-cell">0878-1123-4590</td>
            <td class="kendaraan-cell">-</td>
            <td><span class="status-pill status-cuti">Cuti</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr data-status="nonaktif" data-search="joko prasetyo 19850119006 taman">
            <td>
              <div class="petugas-cell">
                <span class="petugas-avatar">J</span>
                <div>
                  <div class="petugas-name">Joko Prasetyo</div>
                  <div class="petugas-role">Petugas Lapangan</div>
                </div>
              </div>
            </td>
            <td class="nip-cell">19850119006</td>
            <td class="wilayah-cell">Taman</td>
            <td class="kontak-cell">0819-7765-3312</td>
            <td class="kendaraan-cell">-</td>
            <td><span class="status-pill status-nonaktif">Nonaktif</span></td>
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
  const rows = document.querySelectorAll('#petugasTableBody tr');

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