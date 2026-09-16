<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Portal Petugas</title>
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

  /* ===== NAVBAR ===== */
  .navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #0d2b21;
    padding: 14px 32px;
  }

  .nav-left {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .nav-logo {
    width: 28px;
    height: 28px;
    background: #1eb980;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .nav-logo svg {
    width: 15px;
    height: 15px;
    stroke: #ffffff;
    fill: none;
    stroke-width: 2.2;
  }

  .nav-brand {
    color: #ffffff;
    font-weight: 800;
    font-size: 1.02rem;
  }

  .nav-sub {
    color: #8fae9f;
    font-size: 0.85rem;
    margin-left: 6px;
    font-weight: 400;
  }

  .nav-right {
    display: flex;
    align-items: center;
    gap: 18px;
  }

  .icon-btn {
    position: relative;
    width: 19px;
    height: 19px;
    color: #b7d9c8;
    cursor: pointer;
  }

  .icon-btn svg {
    width: 100%;
    height: 100%;
    fill: none;
    stroke: currentColor;
    stroke-width: 2;
  }

  .notif-dot {
    position: absolute;
    top: -2px;
    right: -2px;
    width: 7px;
    height: 7px;
    background: #ef4444;
    border-radius: 50%;
  }

  .user-block {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #1eb980;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    font-weight: 700;
    flex-shrink: 0;
  }

  .user-name {
    font-size: 0.88rem;
    font-weight: 700;
    color: #ffffff;
    line-height: 1.3;
  }

  .user-meta {
    font-size: 0.72rem;
    color: #8fae9f;
  }

  .exit-icon {
    width: 17px;
    height: 17px;
    color: #b7d9c8;
    cursor: pointer;
  }

  /* ===== HERO ===== */
  .hero {
    position: relative;
    background: linear-gradient(180deg, #0d2b21 0%, #123c2d 55%, #f5f7fa 100%);
    padding: 34px 32px 26px;
    color: #ffffff;
  }

  .hero-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
  }

  .shift-label {
    font-size: 0.85rem;
    color: #a9cbba;
    margin-bottom: 6px;
  }

  .hero-greet {
    font-size: 1.5rem;
    font-weight: 800;
  }

  .mini-stats {
    display: flex;
    gap: 26px;
  }

  .mini-stat {
    text-align: center;
    opacity: 0.55;
  }

  .mini-stat-value {
    font-size: 1.3rem;
    font-weight: 800;
  }

  .mini-stat-value.selesai { color: #7fe3b4; }
  .mini-stat-value.diproses { color: #8ec4f5; }
  .mini-stat-value.tertunda { color: #f5c988; }

  .mini-stat-label {
    font-size: 0.72rem;
    color: #cfe6da;
    margin-top: 2px;
  }

  /* TABS */
  .tabs {
    display: flex;
    gap: 10px;
    margin-top: 22px;
  }

  .tab {
    border: none;
    border-radius: 8px;
    padding: 10px 18px;
    font-size: 0.86rem;
    font-weight: 700;
    cursor: pointer;
  }

  .tab.active {
    background: #1eb980;
    color: #ffffff;
  }

  .tab.inactive {
    background: rgba(255, 255, 255, 0.1);
    color: #d7ebe0;
  }

  /* ===== MAIN ===== */
  .main {
    max-width: 900px;
    margin: 0 auto;
    padding: 22px 32px 60px;
  }

  .warning-line {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #dc2626;
    font-size: 0.85rem;
    font-weight: 700;
    letter-spacing: 0.02em;
    margin-bottom: 16px;
  }

  .warning-line svg {
    width: 16px;
    height: 16px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2;
  }

  .task-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
  }

  .task-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: #ffffff;
    border: 1px solid #fecaca;
    border-left: 4px solid #dc2626;
    border-radius: 12px;
    padding: 18px 20px;
    cursor: pointer;
    transition: box-shadow 0.15s ease;
  }

  .task-card:hover {
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
  }

  .task-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .task-icon svg {
    width: 18px;
    height: 18px;
    stroke-width: 2;
    fill: none;
  }

  .task-icon.blue { background: #e8f0fe; }
  .task-icon.blue svg { stroke: #2563eb; }

  .task-icon.red { background: #fee2e2; }
  .task-icon.red svg { stroke: #dc2626; }

  .task-body {
    flex: 1;
    min-width: 0;
  }

  .task-title-row {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 4px;
  }

  .task-title {
    font-size: 0.98rem;
    font-weight: 700;
    color: #111827;
  }

  .badge-mendesak {
    background: #fee2e2;
    color: #dc2626;
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.03em;
    padding: 2px 9px;
    border-radius: 999px;
  }

  .task-address {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.82rem;
    color: #6b7280;
    margin-bottom: 6px;
  }

  .task-address svg {
    width: 13px;
    height: 13px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2;
    flex-shrink: 0;
  }

  .task-note {
    font-size: 0.83rem;
    color: #6b7280;
    font-style: italic;
    margin-bottom: 10px;
    line-height: 1.4;
  }

  .task-footer {
    display: flex;
    align-items: center;
    gap: 14px;
    font-size: 0.8rem;
    color: #6b7280;
  }

  .task-time {
    display: flex;
    align-items: center;
    gap: 5px;
  }

  .task-time svg {
    width: 13px;
    height: 13px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2;
  }

  .status-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-weight: 600;
  }

  .status-pill::before {
    content: "";
    width: 7px;
    height: 7px;
    border-radius: 50%;
  }

  .status-proses { color: #2563eb; }
  .status-proses::before { background: #2563eb; }

  .status-belum { color: #6b7280; }
  .status-belum::before { background: #6b7280; }

  .chevron {
    width: 18px;
    height: 18px;
    color: #d1d5db;
    flex-shrink: 0;
  }

  @media (max-width: 640px) {
    .navbar { padding: 12px 18px; }
    .hero { padding: 26px 18px 22px; }
    .main { padding: 20px 18px 50px; }
    .mini-stats { gap: 16px; }
    .task-card { flex-wrap: wrap; }
  }
</style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="nav-left">
      <div class="nav-logo">
        <svg viewBox="0 0 24 24"><path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.9.66c.38-1 1.9-4.5 3.9-6.5C11 15 14 15 17 12c2.5-2.5 3-7 3-7s-4.5-.5-3 3Z"/></svg>
      </div>
      <span class="nav-brand">EcoTrack</span>
      <span class="nav-sub">Portal Petugas</span>
    </div>
    <div class="nav-right">
      <div class="icon-btn">
        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <span class="notif-dot"></span>
      </div>
      <div class="user-block">
        <div class="avatar">{{ strtoupper(substr(Auth::user()->nama_lengkap, 0, 1)) }}</div>
        <div>
          <div class="user-name">{{ Auth::user()->nama_lengkap }}</div>
          <div class="user-meta">NIP: {{ Auth::user()->nip }} · {{ Auth::user()->wilayah_tugas }}</div>
        </div>
      </div>
      <form method="POST" action="{{ route('logout') }}" style="display: inline;">
           @csrf
          <button type="submit" class="exit-icon" style="background: none; border: none; padding: 0; cursor: pointer; display: flex;">
             <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                 <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                 <path d="M16 17l5-5-5-5"/>
                 <path d="M21 12H9"/>
             </svg>
          </button>
       </form>
    </div>
  </nav>

  <!-- HERO -->
  <div class="hero">
    <div class="hero-top">
      <div>
        <div class="shift-label">Shift Aktif — Senin, 01 Juni 2026</div>
        <div class="hero-greet">Selamat bertugas, {{ explode(' ', Auth::user()->nama_lengkap)[0] }}</div>
      </div>

      <div class="mini-stats">
        <div class="mini-stat">
          <div class="mini-stat-value selesai">8</div>
          <div class="mini-stat-label">Selesai</div>
        </div>
        <div class="mini-stat">
          <div class="mini-stat-value diproses">1</div>
          <div class="mini-stat-label">Diproses</div>
        </div>
        <div class="mini-stat">
          <div class="mini-stat-value tertunda">1</div>
          <div class="mini-stat-label">Tertunda</div>
        </div>
      </div>
    </div>

    <div class="tabs">
      <button class="tab active">Hari Ini (2 Tugas)</button>
      <button class="tab inactive">Besok (1 Tugas)</button>
    </div>
  </div>

  <!-- MAIN -->
  <div class="main">
    <div class="warning-line">
      <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
      TUGAS MENDESAK — PRIORITAS TINGGI
    </div>

    <div class="task-list">
      <div class="task-card">
        <div class="task-icon blue">
          <svg viewBox="0 0 24 24"><path d="M14 18V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h1"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62L19 8h-4"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
        </div>
        <div class="task-body">
          <div class="task-title-row">
            <div class="task-title">TPS Taman Kota</div>
            <span class="badge-mendesak">MENDESAK</span>
          </div>
          <div class="task-address">
            <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            Jl. Pahlawan No. 12, Kartoharjo
          </div>
          <div class="task-note">"Prioritas tinggi - sudah 2 hari menumpuk. Gunakan truk kapasitas besar."</div>
          <div class="task-footer">
            <div class="task-time">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              09:00
            </div>
            <span class="status-pill status-proses">Sedang Diproses</span>
          </div>
        </div>
        <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
      </div>

      <div class="task-card">
        <div class="task-icon red">
          <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div class="task-body">
          <div class="task-title-row">
            <div class="task-title">TPS Nambangan</div>
            <span class="badge-mendesak">MENDESAK</span>
          </div>
          <div class="task-address">
            <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            Jl. Nambangan Lor No. 8, Manguharjo
          </div>
          <div class="task-note">"TPS penuh total, segera angkut. Perhatikan keamanan lalu lintas."</div>
          <div class="task-footer">
            <div class="task-time">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
              11:00
            </div>
            <span class="status-pill status-belum">Belum Diangkut</span>
          </div>
        </div>
        <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
      </div>
    </div>
  </div>

</body>
</html>