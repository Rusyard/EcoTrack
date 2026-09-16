<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Buat Akun Baru</title>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    min-height: 100vh;
  }

  .page {
    display: flex;
    min-height: 100vh;
  }

  /* ===== PANEL KIRI ===== */
  .panel-left {
    position: relative;
    flex: 0 0 50%;
    background-image:
      linear-gradient(160deg, rgba(6, 60, 48, 0.75), rgba(6, 90, 70, 0.55)),
      url("https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?auto=format&fit=crop&w=1200&q=80");
    background-size: cover;
    background-position: center;
    color: #ffffff;
    padding: 60px 56px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
  }

  .brand-row {
    font-size: 1.9rem;
    margin-bottom: 28px;
  }

  .brand-row .eco {
    font-weight: 400;
    color: #6be3ad;
  }

  .brand-row .track {
    font-weight: 800;
  }

  .headline {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 18px;
    line-height: 1.25;
  }

  .subtext {
    color: #b9ecd4;
    font-size: 1rem;
    line-height: 1.6;
    max-width: 420px;
    margin-bottom: 34px;
  }

  .feature-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
  }

  .feature-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(6px);
    border-radius: 12px;
    padding: 16px 20px;
    max-width: 450px;
  }

  .feature-icon {
    flex-shrink: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #1eb980;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .feature-icon svg {
    width: 20px;
    height: 20px;
    stroke: #ffffff;
    fill: none;
    stroke-width: 2;
  }

  .feature-title {
    font-weight: 700;
    font-size: 0.95rem;
    margin-bottom: 2px;
  }

  .feature-desc {
    font-size: 0.85rem;
    color: #d6f2e3;
  }

  /* ===== PANEL KANAN ===== */
  .panel-right {
    flex: 1;
    background-color: #f5f7fa;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 60px 40px;
  }

  .form-wrapper {
    width: 100%;
    max-width: 480px;
  }

  h1.title {
    font-size: 1.85rem;
    font-weight: 800;
    color: #111827;
    margin-bottom: 10px;
  }

  .lead {
    color: #6b7280;
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 30px;
  }

  .field {
    margin-bottom: 20px;
  }

  label {
    display: block;
    font-size: 0.9rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
  }

  .input-group {
    position: relative;
    display: flex;
    align-items: center;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    padding: 0 14px;
    background: #ffffff;
    transition: border-color 0.15s ease, box-shadow 0.15s ease;
  }

  .input-group:focus-within {
    border-color: #1eb980;
    box-shadow: 0 0 0 3px rgba(30, 185, 128, 0.15);
  }

  .input-group svg {
    width: 18px;
    height: 18px;
    color: #6b7280;
    flex-shrink: 0;
  }

  .input-group input,
  .input-group select {
    border: none;
    outline: none;
    padding: 12px 10px;
    font-size: 0.95rem;
    width: 100%;
    color: #111827;
    background: transparent;
    appearance: none;
  }

  .input-group input::placeholder {
    color: #9ca3af;
  }

  .input-group.select-group svg.chevron {
    margin-left: auto;
    flex-shrink: 0;
  }

  .row-2 {
    display: flex;
    gap: 16px;
  }

  .row-2 .field {
    flex: 1;
  }

  .btn-submit {
    width: 100%;
    background-color: #0f5c3f;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    padding: 14px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background-color 0.15s ease;
    margin-top: 6px;
  }

  .btn-submit:hover {
    background-color: #0c4a33;
  }

  .btn-submit svg {
    width: 18px;
    height: 18px;
  }

  .login-hint {
    text-align: center;
    font-size: 0.9rem;
    color: #374151;
    margin-top: 22px;
  }

  .login-hint a {
    color: #0f7a4e;
    font-weight: 700;
    text-decoration: none;
  }

  .login-hint a:hover {
    text-decoration: underline;
  }

  .divider {
    border: none;
    border-top: 1px solid #e5e7eb;
    margin: 26px 0 18px;
  }

  .fine-print {
    text-align: center;
    font-size: 0.8rem;
    color: #9ca3af;
    line-height: 1.5;
  }

  @media (max-width: 900px) {
    .page {
      flex-direction: column;
    }
    .panel-left {
      flex: none;
      min-height: 360px;
    }
    .panel-right {
      padding: 40px 24px;
    }
  }
</style>
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

<script>
  document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const pass = document.getElementById('password').value;
    const confirm = document.getElementById('confirmPassword').value;
    if (pass !== confirm) {
      alert('Password dan konfirmasi password tidak cocok.');
      return;
    }
    alert('Form pendaftaran siap dihubungkan ke backend.');
  });
</script>

</body>
</html>