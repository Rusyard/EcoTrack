<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Buat Akun Baru</title>
<link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
</head>
<body>

<div class="page">

  <!-- PANEL KIRI -->
  <div class="panel-left">
    <div class="brand-row"><span class="eco">eco</span><span class="track">EcoTrack</span></div>
    <h2 class="headline">Pemantauan TPS Real-Time</h2>
    <p class="subtext">Wujudkan lingkungan yang lebih bersih melalui pengelolaan limbah berbasis data yang cerdas dan efisien.</p>

    <div class="feature-list">
      <div class="feature-card">
        <div class="feature-icon">
          <svg viewBox="0 0 24 24">
            <path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/>
            <circle cx="12" cy="10" r="3"/>
          </svg>
        </div>
        <div>
          <div class="feature-title">Lacak Lokasi</div>
          <div class="feature-desc">Peta TPS terintegrasi secara langsung.</div>
        </div>
      </div>

      <div class="feature-card">
        <div class="feature-icon">
          <svg viewBox="0 0 24 24">
            <rect x="3" y="3" width="18" height="18" rx="2"/>
            <path d="M8 17V11M12 17V7M16 17v-4"/>
          </svg>
        </div>
        <div>
          <div class="feature-title">Analisis Data</div>
          <div class="feature-desc">Pantau level volume sampah harian.</div>
        </div>
      </div>
    </div>
  </div>

  <!-- PANEL KANAN -->
  <div class="panel-right">
    <div class="form-wrapper">
      <h1 class="title">Buat Akun Baru</h1>
      <p class="lead">Daftarkan diri Anda untuk mulai berkontribusi pada kebersihan kota.</p>

      <form id="registerForm">
        <div class="field">
          <label for="fullname">Nama Lengkap</label>
          <div class="input-group">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
              <circle cx="12" cy="7" r="4"/>
            </svg>
            <input type="text" id="fullname" name="fullname" placeholder="Masukkan nama lengkap" required>
          </div>
        </div>

        <div class="field">
          <label for="email">Email atau Username</label>
          <div class="input-group">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="2" y="4" width="20" height="16" rx="2"/>
              <path d="m2 7 10 6 10-6"/>
            </svg>
            <input type="text" id="email" name="email" placeholder="contoh@ecotrack.com" required>
          </div>
        </div>

        <div class="field">
          <label for="role">Peran/Kategori Pengguna</label>
          <div class="input-group select-group">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M17 20v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/>
              <circle cx="9" cy="7" r="4"/>
              <path d="M23 20v-2a4 4 0 0 0-3-3.87"/>
              <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            <select id="role" name="role" required>
              <option value="" disabled selected>Pilih Peran</option>
              <option value="warga">Warga</option>
              <option value="petugas">Petugas Kebersihan</option>
              <option value="admin">Admin TPS</option>
            </select>
            <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16">
              <path d="m6 9 6 6 6-6"/>
            </svg>
          </div>
        </div>

        <div class="row-2">
          <div class="field">
            <label for="password">Password</label>
            <div class="input-group">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
              </svg>
              <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>
          </div>

          <div class="field">
            <label for="confirmPassword">Konfirmasi Password</label>
            <div class="input-group">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="m9 12 2 2 4-4"/>
              </svg>
              <input type="password" id="confirmPassword" name="confirmPassword" placeholder="••••••••" required>
            </div>
          </div>
        </div>

        <button type="submit" class="btn-submit">
          Daftar Sekarang
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M5 12h14"/>
            <path d="m12 5 7 7-7 7"/>
          </svg>
        </button>

        <p class="login-hint">Sudah punya akun? <a href="login-ecotrack.html">Login di sini</a></p>

        <hr class="divider">

        <p class="fine-print">Dengan mendaftar, Anda menyetujui Syarat dan Ketentuan serta Kebijakan Privasi EcoTrack.</p>
      </form>
    </div>
  </div>

</div>

<script src="{{ asset('js/registrasi.js') }}"></script>

</body>
</html>
