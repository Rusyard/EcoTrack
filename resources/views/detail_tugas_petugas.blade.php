@extends('layout.petugas')

@section('title', 'EcoTrack - ' . $judul)

@section('content')

  <div class="page-title">{{ $judul }}</div>

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
      <div class="map-box">
        <div class="map-legend">
          <div><span class="dot green"></span> Aman (&lt; 50%)</div>
          <div><span class="dot orange"></span> Sedang (50-79%)</div>
          <div><span class="dot red"></span> Kritis (&ge; 80%)</div>
        </div>
        @foreach ($petaPin as $pin)
          <div class="map-pin {{ $pin['status'] }}" style="top: {{ $pin['top'] }}px; left: {{ $pin['left'] }}px;"></div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- TABS -->
  <div class="tabs-wrap">
    <div class="tab-item active" data-tab="detail">Detail Tugas</div>
    <div class="tab-item" data-tab="update">Update Status</div>
  </div>

  <!-- PANEL: DETAIL TUGAS -->
  <div class="status-panel" data-panel="detail">
    <div class="status-grid">
      <div class="status-box">
        <div class="status-box-label">STATUS SAAT INI</div>
        <div class="status-box-value proses">{{ $statusLabel }}</div>
      </div>
      <div class="status-box">
        <div class="status-box-label">ID JADWAL</div>
        <div class="status-box-value">{{ $jadwal->kode_jadwal }}</div>
      </div>
      <div class="status-box">
        <div class="status-box-label">JENIS TUGAS</div>
        <div class="status-box-value mendesak">{{ $mendesak ? '⚠ Mendesak' : 'Normal' }}</div>
      </div>
    </div>

    <button class="btn-update" type="button" data-goto-tab="update">
      Mulai Update Status
      <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
    </button>
  </div>

  <!-- PANEL: UPDATE STATUS -->
  <div class="status-panel" data-panel="update" style="display:none;">
    <div class="update-label">Status Pengangkutan</div>
    <div class="status-toggle-row">
      <button type="button" class="status-toggle active">
        <svg viewBox="0 0 24 24"><path d="M14 18V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h1"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62L19 8h-4"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
        Mulai Pengangkutan
      </button>
      <button type="button" class="status-toggle">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
        Selesai Diangkut
      </button>
    </div>

    <div class="update-label with-icon">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3Z"/><circle cx="12" cy="13" r="3"/></svg>
      Foto Bukti Pengangkutan
    </div>
    <label class="upload-box" for="foto-bukti-input">
      <input type="file" id="foto-bukti-input" accept="image/*">
      <div class="upload-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 16V4M6 10l6-6 6 6"/><path d="M4 20h16"/></svg>
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