@extends('layout.app')

@section('title', $judul)
@section('css', 'resources/css/form_laporan.css')
@section('js', 'resources/js/form_laporan.js')

@section('content')

  @include('partials.topbar_form', ['kembali' => $kembali])

  <div class="main">
    <h1 class="page-title">{{ $judulHalaman }}</h1>
    <p class="page-desc">{{ $deskripsiHalaman }}</p>

    <form id="reportForm">

      <!-- 1. PILIH LOKASI -->
      <div class="section">
        <div class="section-title">
          <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          1. Pilih Lokasi TPS
        </div>

        <div class="location-grid">
          @foreach ($daftarTps as $tps)
            @include('partials.lokasi_option', ['tps' => $tps])
          @endforeach
        </div>
      </div>

      <!-- 2. DESKRIPSI -->
      <div class="section">
        <div class="section-title">
          <svg viewBox="0 0 24 24"><path d="M4 4h16v16H4z"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>
          2. Deskripsi Kondisi Lapangan
        </div>

        <textarea id="deskripsi" name="deskripsi" minlength="20" placeholder="Jelaskan kondisi TPS secara detail. Contoh: Sampah menumpuk dan meluber ke jalan, sudah 3 hari tidak diangkut. Bau menyengat dan terdapat genangan air di sekitar TPS..."></textarea>
        <div class="char-count"><span id="charCount">0</span> karakter — minimal 20 karakter</div>
      </div>

      <!-- 3. UPLOAD FOTO -->
      <div class="section">
        <div class="section-title">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg>
          3. Unggah Foto Kondisi TPS
        </div>

        <label class="upload-zone" id="uploadZone" for="fileInput">
          <div class="upload-icon">
            <svg viewBox="0 0 24 24"><path d="M12 15V3M6 9l6-6 6 6"/><path d="M4 17v3a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-3"/></svg>
          </div>
          <div class="upload-title">Seret &amp; Lepaskan Foto</div>
          <div class="upload-sub">atau klik untuk memilih dari perangkat Anda</div>
          <div class="upload-format">Format: JPG, PNG, WEBP — Maks. 5MB</div>
          <input type="file" id="fileInput" accept="image/jpeg,image/png,image/webp">
          <div class="file-preview" id="filePreview"></div>
        </label>
      </div>

      <div class="actions">
        <button type="button" class="btn btn-cancel" id="btnBatal" data-href="{{ $kembali }}">Batal</button>
        <button type="submit" class="btn btn-submit">Kirim Laporan</button>
      </div>

    </form>
  </div>

@endsection
