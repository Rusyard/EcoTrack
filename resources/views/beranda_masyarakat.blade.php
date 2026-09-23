<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Dashboard</title>
<link rel="stylesheet" href="{{ asset('css/beranda_masyarakat.css') }}">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <div class="nav-left">
      <div class="nav-logo">
        <svg viewBox="0 0 24 24">
          <path d="M17 8C8 10 5.9 16.17 3.82 21.34l1.9.66c.38-1 1.9-4.5 3.9-6.5C11 15 14 15 17 12c2.5-2.5 3-7 3-7s-4.5-.5-3 3Z"/>
        </svg>
      </div>
      EcoTrack
    </div>
    
    <div class="nav-right">
      <div class="icon-btn">
        <svg viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <span class="notif-dot"></span>
      </div>
      <div class="user-chip">
        <div class="avatar">{{ strtoupper(substr(Auth::user()->nama_lengkap, 0, 1)) }}</div>
        {{ explode(' ', Auth::user()->nama_lengkap)[0] }}
      </div>
      <form method="POST" action="{{ route('logout') }}" style="display: inline;">
    @csrf
    <button type="submit" class="logout-icon" style="background: none; border: none; padding: 0; cursor: pointer; display: flex;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <path d="M16 17l5-5-5-5"/>
            <path d="M21 12H9"/>
        </svg>
    </button>
</form>
    </div>
  </nav>

  <div class="main">

    <!-- HERO -->
    <div class="hero">
      <div class="hero-eyebrow">Selamat datang kembali,</div>
      <div class="hero-name">{{ Auth::user()->nama_lengkap }} </div>
      <p class="hero-desc">Mari jaga kebersihan lingkungan sekitar kita! Laporkan kondisi TPS di dekat Anda.</p>
      <a href="{{ route('form.laporan') }}" class="btn-hero">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
        Laporkan Sekarang
      </a>
    </div>

    <!-- STAT CARDS -->
    <div class="stats">
      <div class="stat-card">
        <div class="stat-icon green">
          <svg viewBox="0 0 24 24" stroke="currentColor"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><path d="M14 2v6h6"/></svg>
        </div>
        <div>
          <div class="stat-number">4</div>
          <div class="stat-label">Laporan Terkirim</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon blue">
          <svg viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        </div>
        <div>
          <div class="stat-number">1</div>
          <div class="stat-label">Sedang Diproses</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon mint">
          <svg viewBox="0 0 24 24" stroke="currentColor"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m22 4-10 10-3-3"/></svg>
        </div>
        <div>
          <div class="stat-number">2</div>
          <div class="stat-label">Selesai Diangkut</div>
        </div>
      </div>
    </div>

    <!-- HISTORY -->
    <div class="history-card">
      <div class="history-header">
        <div class="history-title">Histori Laporan Saya</div>
        
      </div>

      <table>
        <thead>
          <tr>
            <th>ID Laporan</th>
            <th>Tanggal</th>
            <th>Lokasi TPS</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="id-cell">RPT001</td>
            <td>2026-05-31</td>
            <td>TPS Taman Kota</td>
            <td class="desc-cell">Sampah menumpuk dan berbau tidak sedap, sudah 2 hari belum diangkut. Volume sudah...</td>
            <td><span class="status-pill status-proses">Proses Pengangkutan</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr>
            <td class="id-cell">RPT002</td>
            <td>2026-06-01</td>
            <td>TPS Nambangan</td>
            <td class="desc-cell">TPS penuh total, sampah meluber ke jalan dan mengganggu pejalan kaki.</td>
            <td><span class="status-pill status-menunggu">Menunggu Validasi</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr>
            <td class="id-cell">RPT003</td>
            <td>2026-05-28</td>
            <td>TPS Pasar Besar</td>
            <td class="desc-cell">Keterlambatan pengangkutan lebih dari 3 hari. Banyak lalat dan tikus di sekitar TPS.</td>
            <td><span class="status-pill status-selesai">Selesai</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
          <tr>
            <td class="id-cell">RPT004</td>
            <td>2026-05-27</td>
            <td>TPS Oro-Oro Ombo</td>
            <td class="desc-cell">Bak sampah hampir penuh dan butuh pengangkutan segera sebelum akhir pekan.</td>
            <td><span class="status-pill status-selesai">Selesai</span></td>
            <td><a href="#" class="detail-link">Detail ›</a></td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

</body>
</html>
