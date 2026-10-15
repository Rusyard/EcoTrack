<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EcoTrack - Reset Password</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    background-color: #f5f7fa;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
  }

  .wrapper {
    width: 100%;
    max-width: 440px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .logo-icon {
    width: 64px;
    height: 64px;
    background-color: #1eb980;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
  }

  .logo-icon svg {
    width: 30px;
    height: 30px;
    stroke: #0e3d2c;
    stroke-width: 2;
    fill: none;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  h1.brand {
    font-size: 2rem;
    font-weight: 800;
    color: #0f7a4e;
    margin-bottom: 10px;
    letter-spacing: -0.5px;
  }

  .tagline {
    color: #6b7280;
    font-size: 0.95rem;
    text-align: center;
    line-height: 1.5;
    margin-bottom: 30px;
    max-width: 340px;
  }

  .card {
    width: 100%;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 14px;
    padding: 32px;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
  }

  .field { margin-bottom: 20px; }

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
    transition: border-color 0.15s ease, box-shadow 0.15s ease;
  }

  .input-group:focus-within {
    border-color: #1eb980;
    box-shadow: 0 0 0 3px rgba(30, 185, 128, 0.15);
  }

  .input-group.error { border-color: #dc2626; }

  .input-group svg {
    width: 18px;
    height: 18px;
    color: #6b7280;
    flex-shrink: 0;
  }

  .input-group input {
    border: none;
    outline: none;
    padding: 12px 10px;
    font-size: 0.95rem;
    width: 100%;
    color: #111827;
    background: transparent;
  }

  .input-group input::placeholder { color: #9ca3af; }

  .input-group input:disabled { color: #6b7280; }

  .error-text {
    color: #dc2626;
    font-size: 0.8rem;
    margin-top: 6px;
  }

  .hint-text {
    color: #9ca3af;
    font-size: 0.78rem;
    margin-top: 6px;
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
  }

  .btn-submit:hover { background-color: #0c4a33; }

  .btn-submit svg { width: 18px; height: 18px; }
</style>
</head>
<body>

  <div class="wrapper">
    <div class="logo-icon">
      <svg viewBox="0 0 24 24">
        <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
      </svg>
    </div>

    <h1 class="brand">Buat Password Baru</h1>
    <p class="tagline">Masukkan password baru buat akun EcoTrack Anda.</p>

    <div class="card">
      <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <div class="field">
          <label for="password">Password Baru</label>
          <div class="input-group {{ $errors->has('password') ? 'error' : '' }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <input type="password" id="password" name="password" placeholder="••••••••" required autofocus>
          </div>
          <div class="hint-text">Minimal 8 karakter, kombinasi huruf dan angka.</div>
          @error('password')
            <div class="error-text">{{ $message }}</div>
          @enderror
        </div>

        <div class="field">
          <label for="password_confirmation">Konfirmasi Password Baru</label>
          <div class="input-group">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
          </div>
        </div>

        <button type="submit" class="btn-submit">
          Simpan Password Baru
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>
        </button>
      </form>
    </div>
  </div>

</body>
</html>