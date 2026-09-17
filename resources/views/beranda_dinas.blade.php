<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Dashboard Monitoring</title>
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
  }

  .topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 24px;
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
    padding: 18px 20px;
  }

  .stat-card.danger {
    border-color: #fecaca;
    background: #fffafa;
  }

  .stat-value {
    font-size: 1.7rem;
    font-weight: 800;
    margin-bottom: 6px;
  }

  .stat-value.green { color: #16a34a; }
  .stat-value.blue { color: #2563eb; }
  .stat-value.orange { color: #ea580c; }
  .stat-value.red { color: #dc2626; }

  .stat-title {
    font-size: 0.85rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 2px;
  }

  .stat-sub {
    font-size: 0.78rem;
    color: #9ca3af;
  }

  /* GRID PANELS */
  .panel-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
  }

  .panel {
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 20px 22px;
  }

  .panel-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
  }

  .panel-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: #111827;
  }

  .panel-badge {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.78rem;
    color: #16a34a;
    font-weight: 700;
  }

  .panel-badge svg {
    width: 13px;
    height: 13px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2.5;
  }

  .panel-link {
    font-size: 0.8rem;
    color: #0f7a4e;
    font-weight: 700;
    text-decoration: none;
  }

  .panel-link:hover {
    text-decoration: underline;
  }

  /* BAR CHART */
  .bar-chart {
    display: flex;
    align-items: flex-end;
    gap: 14px;
    height: 170px;
    padding-top: 10px;
  }

  .bar-col {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    height: 100%;
  }

  .bar {
    width: 100%;
    max-width: 28px;
    background: #1eb980;
    border-radius: 5px 5px 0 0;
  }

  .bar-label {
    font-size: 0.75rem;
    color: #9ca3af;
    margin-top: 8px;
  }

  /* MAP */
  .map-area {
    position: relative;
    height: 230px;
    border-radius: 10px;
    overflow: hidden;
    background:
      linear-gradient(#dce8de 1px, transparent 1px),
      linear-gradient(90deg, #dce8de 1px, transparent 1px),
      #e9f2ea;
    background-size: 32px 32px;
  }

  .map-road {
    position: absolute;
    background: #ffffff;
  }

  .map-district {
    position: absolute;
    font-size: 0.68rem;
    color: #9ab6a2;
    font-weight: 600;
  }

  .map-dot {
    position: absolute;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    transform: translate(-50%, -50%);
  }

  .map-dot.aman { background: #16a34a; box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.18); }
  .map-dot.sedang { background: #ea580c; box-shadow: 0 0 0 4px rgba(234, 88, 12, 0.18); }
  .map-dot.kritis { background: #dc2626; box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.18); }

  .map-dot.pulse::after {
    content: "";
    position: absolute;
    inset: -10px;
    border-radius: 50%;
    border: 2px solid #dc2626;
    opacity: 0.5;
    animation: pulse 1.8s ease-out infinite;
  }

  @keyframes pulse {
    0% { transform: scale(0.6); opacity: 0.6; }
    100% { transform: scale(1.6); opacity: 0; }
  }

  .map-legend {
    display: flex;
    gap: 16px;
    margin-top: 14px;
    flex-wrap: wrap;
  }

  .legend-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    color: #6b7280;
  }

  .legend-dot {
    width: 9px;
    height: 9px;
    border-radius: 50%;
  }

  .legend-dot.aman { background: #16a34a; }
  .legend-dot.sedang { background: #ea580c; }
  .legend-dot.kritis { background: #dc2626; }

  @media (max-width: 1000px) {
    .stat-grid { grid-template-columns: repeat(2, 1fr); }
    .panel-grid { grid-template-columns: 1fr; }
  }

  @media (max-width: 760px) {
    .sidebar { display: none; }
    .stat-grid { grid-template-columns: 1fr; }
  }
</style>
</head>
<body>

<div class="layout">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <div class="sidebar-logo">
        <svg viewBox="0 0 24 24"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.9.66c.38-1 1.9-4.5 3.9-6.5C11 15 14 15 17 12c2.5-2.5 3-7 3-7s-4.5-.5-3 3Z"/></svg>
      </div>
      EcoTrack
    </div>

    <div class="org-box">
      <div class="org-label">DINAS KEBERSIHAN</div>
      <div class="org-name">Kota Madiun</div>
    </div>

    <ul class="nav-list">
      <li>
        <a href="#" class="nav-item active">
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
        <a href="{{ route('keloladata.petugas.dinas') }}" class="nav-item">
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
        <svg viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M7 15l4-6 4 4 5-8"/></svg>
        Dashboard Monitoring
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
        <div class="stat-value green">6</div>
        <div class="stat-title">Total TPS Aktif</div>
        <div class="stat-sub">Kota Madiun</div>
      </div>
      <div class="stat-card">
        <div class="stat-value blue">3</div>
        <div class="stat-title">Laporan Hari Ini</div>
        <div class="stat-sub">Masuk ke sistem</div>
      </div>
      <div class="stat-card">
        <div class="stat-value orange">3</div>
        <div class="stat-title">Petugas Aktif</div>
        <div class="stat-sub">Siap bertugas</div>
      </div>
      <div class="stat-card danger">
        <div class="stat-value red">3</div>
        <div class="stat-title">Butuh Tindakan</div>
        <div class="stat-sub">Segera diproses</div>
      </div>
    </div>

    <!-- PANELS -->
    <div class="panel-grid">
      <div class="panel">
        <div class="panel-header">
          <div class="panel-title">Volume Sampah Mingguan</div>
          <div class="panel-badge">
            <svg viewBox="0 0 24 24"><path d="M23 6l-9.5 9.5-5-5L1 18"/><path d="M17 6h6v6"/></svg>
            +12% dari minggu lalu
          </div>
        </div>

        <div class="bar-chart">
          <div class="bar-col"><div class="bar" style="height:75%"></div><div class="bar-label">Sen</div></div>
          <div class="bar-col"><div class="bar" style="height:58%"></div><div class="bar-label">Sel</div></div>
          <div class="bar-col"><div class="bar" style="height:50%"></div><div class="bar-label">Rab</div></div>
          <div class="bar-col"><div class="bar" style="height:42%"></div><div class="bar-label">Kam</div></div>
          <div class="bar-col"><div class="bar" style="height:67%"></div><div class="bar-label">Jum</div></div>
          <div class="bar-col"><div class="bar" style="height:100%"></div><div class="bar-label">Sab</div></div>
          <div class="bar-col"><div class="bar" style="height:33%"></div><div class="bar-label">Min</div></div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-header">
          <div class="panel-title">Peta TPS — Kota Madiun</div>
          <a href="#" class="panel-link">Lihat Laporan →</a>
        </div>

        <div class="map-area">
          <div class="map-district" style="top:14px; left:16px;">Manguharjo</div>
          <div class="map-district" style="top:14px; right:16px;">Kartoharjo</div>
          <div class="map-district" style="bottom:14px; left:16px;">Manguharjo</div>
          <div class="map-district" style="bottom:14px; right:16px;">Taman</div>

          <div class="map-dot aman" style="top:35%; left:60%;"></div>
          <div class="map-dot kritis pulse" style="top:48%; left:47%;"></div>
          <div class="map-dot sedang" style="top:30%; left:78%;"></div>
          <div class="map-dot aman" style="top:75%; left:30%;"></div>
          <div class="map-dot aman" style="top:82%; left:68%;"></div>
        </div>

        <div class="map-legend">
          <div class="legend-item"><span class="legend-dot aman"></span>Aman (&lt; 50%)</div>
          <div class="legend-item"><span class="legend-dot sedang"></span>Sedang (50–79%)</div>
          <div class="legend-item"><span class="legend-dot kritis"></span>Kritis (≥ 80%)</div>
        </div>
      </div>
    </div>

  </main>

</div>

</body>
</html>