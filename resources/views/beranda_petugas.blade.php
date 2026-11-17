@extends('layout.portal_petugas')

@section('title', $judul)
@section('css', 'resources/css/beranda_petugas.css')
@section('js', 'resources/js/beranda_petugas.js')

@section('content')
  <!-- HERO -->
  <div class="hero">
    <div class="hero-top">
      <div>
        <div class="shift-label">Shift Aktif — {{ $tanggal }}</div>
        <div class="hero-greet">Selamat bertugas, {{ $namaDepan }}</div>
      </div>

      <div class="mini-stats">
        @include('partials.mini_stat_petugas', ['kelas' => 'selesai', 'nilai' => $jumlahSelesai, 'label' => 'Selesai'])
        @include('partials.mini_stat_petugas', ['kelas' => 'diproses', 'nilai' => $jumlahDiproses, 'label' => 'Diproses'])
        @include('partials.mini_stat_petugas', ['kelas' => 'tertunda', 'nilai' => $jumlahTertunda, 'label' => 'Tertunda'])
      </div>
    </div>

    <div class="tabs">
      <button id="tab-hari-ini" class="tab active" onclick="gantiTab('hari-ini')">Hari Ini ({{ $tugasHariIni->count() }} Tugas)</button>
      <button id="tab-besok" class="tab inactive" onclick="gantiTab('besok')">Besok ({{ $tugasBesok->count() }} Tugas)</button>
    </div>
  </div>

  <!-- MAIN -->
  <div class="main">
  <div id="konten-hari-ini">
    <div class="warning-line">
      <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
      TUGAS HARI INI
    </div>

    <div class="task-list">
      @forelse ($tugasHariIni as $jadwal)
        @include('partials.kartu_tugas_petugas', ['jadwal' => $jadwal, 'ikon' => 'truk', 'warnaNormal' => 'blue'])
      @empty
        <div style="text-align:center; color:#9ca3af; padding:28px; background:#fff; border-radius:12px;">
          Tidak ada tugas pengangkutan buat hari ini.
        </div>
      @endforelse
    </div>
  </div>

  <div id="konten-besok" style="display:none;">
    <div class="warning-line" style="color:#16a34a;">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 18V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h1"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62L19 8h-4"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
      TUGAS BESOK
    </div>

    <div class="task-list">
      @forelse ($tugasBesok as $jadwal)
        @include('partials.kartu_tugas_petugas', ['jadwal' => $jadwal, 'ikon' => 'pin', 'warnaNormal' => 'green', 'garisHijau' => true])
      @empty
        <div style="text-align:center; color:#9ca3af; padding:28px; background:#fff; border-radius:12px;">
          Belum ada tugas pengangkutan buat besok.
        </div>
      @endforelse
    </div>
  </div>
  </div>
@endsection
