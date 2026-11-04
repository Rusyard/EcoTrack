@extends('layout.petugas')

@section('title', $judul)
@section('css', 'resources/css/detail_tugas_petugas.css')
@section('js', 'resources/js/detail_tugas_petugas.js')

@section('content')
  <div class="page-title">Detail Tugas Pengangkutan</div>

  <div class="grid-top">
    <!-- INFORMASI TUGAS -->
    <div class="card">
      <div class="card-title">
        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg>
        Informasi Tugas
      </div>

      @if ($mendesak)
        <div class="priority-banner">
          <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
          Prioritas Mendesak
        </div>
      @endif

      <div class="info-row">
        <svg viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg>
        <span><span class="info-label">TPS Target:</span> <strong>{{ $tps->nama_tps }}</strong></span>
      </div>
      <div class="info-row">
        <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
        <span><span class="info-label">Alamat:</span> {{ $tps->alamat }}</span>
      </div>
      <div class="info-row">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        <span><span class="info-label">Jadwal:</span> {{ $jadwal->tanggal->format('d M Y') }} - {{ \Illuminate\Support\Carbon::parse($jadwal->waktu)->format('H:i') }} WIB</span>
      </div>

      <div class="capacity-bar-wrap">
        <div class="capacity-bar-track">
          <div class="capacity-bar-fill" style="width: {{ $kapasitas }}%;"></div>
        </div>
        <span class="capacity-value">{{ $kapasitas }}%</span>
      </div>

      <div class="instruksi-box">
        <div class="instruksi-label">INSTRUKSI DINAS</div>
        <div class="instruksi-text">{{ $jadwal->catatan ?? 'Tidak ada instruksi khusus.' }}</div>
      </div>

      @if ($laporan)
        <div class="instruksi-box" style="background:#eaf1fe; border-left-color:#2563eb; margin-top:10px;">
          <div class="instruksi-label" style="color:#1d4ed8;">DESKRIPSI LAPORAN MASYARAKAT</div>
          <div class="instruksi-text" style="color:#1e3a8a;">{{ $laporan->deskripsi }}</div>
        </div>
      @endif
    </div>

    <!-- LOKASI TPS -->
    <div class="card">
      <div class="card-title">
        <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
        Lokasi TPS
      </div>
      @include('partials.peta_tps_petugas')
    </div>
  </div>

  <!-- TABS -->
  <div class="tabs-wrap">
    <div id="tab-detail" class="tab-item active" onclick="gantiTabDetail('detail')">Detail Tugas</div>
    <div id="tab-update" class="tab-item" onclick="gantiTabDetail('update')">Update Status</div>
  </div>

  <!-- PANEL: DETAIL TUGAS -->
  <div id="panel-detail-tugas" class="status-panel">
    @if (session('success'))
      <div style="background:#dcfce7; color:#166534; padding:12px 16px; border-radius:10px; margin-bottom:16px; font-size:0.88rem; font-weight:600;">
        {{ session('success') }}
      </div>
    @endif

    <div class="status-grid">
      @include('partials.kotak_status_petugas', ['label' => 'STATUS SAAT INI', 'nilai' => $statusLabel, 'kelas' => 'proses'])
      @include('partials.kotak_status_petugas', ['label' => 'ID JADWAL', 'nilai' => $jadwal->kode_jadwal])
      @include('partials.kotak_status_petugas', ['label' => 'JENIS TUGAS', 'nilai' => $mendesak ? '⚠ Mendesak' : 'Normal', 'kelas' => 'mendesak'])
    </div>

    @if ($jadwal->status === 'selesai')
      <div style="text-align:center; color:#16a34a; font-weight:700; padding:14px; background:#f0fdf4; border-radius:10px;">
        ✓ Tugas ini sudah selesai dikirim, menunggu validasi dinas.
      </div>
    @else
      <button class="btn-update" type="button" onclick="gantiTabDetail('update')">
        Mulai Update Status
        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
      </button>
    @endif
  </div>

  <!-- PANEL: UPDATE STATUS -->
  <div id="panel-update-status" class="status-panel" style="display:none;">
    <form method="POST" action="{{ route('detail.tugas.selesai', $jadwal) }}" enctype="multipart/form-data">
      @csrf

      <div class="update-label with-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3Z"/><circle cx="12" cy="13" r="3"/></svg>
        Foto Bukti Pengangkutan
      </div>
      <label class="upload-box" for="foto-bukti-input">
        <input type="file" name="foto_sesudah" id="foto-bukti-input" accept="image/*" style="display:none;" onchange="fotoBuktiDipilih(this)" required>
        <div class="upload-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 16V4M6 10l6-6 6 6"/><path d="M4 20h16"/></svg>
        </div>
        <div class="upload-title">Unggah Foto Bukti</div>
        <div class="upload-sub" id="foto-bukti-sub">Foto kondisi TPS setelah diangkut</div>
      </label>
      @error('foto_sesudah')
        <div style="color:#dc2626; font-size:0.82rem; margin-top:-14px; margin-bottom:16px;">{{ $message }}</div>
      @enderror

      <div class="update-label">Catatan Lapangan</div>
      <textarea name="catatan" class="catatan-textarea" placeholder="Catatan kondisi lapangan, kendala, atau informasi tambahan...">{{ old('catatan') }}</textarea>

      <button class="btn-kirim" type="submit">Kirim Laporan Status Selesai Ke Dinas</button>
    </form>
  </div>
@endsection
