{{--
  Satu kartu tugas.
  Variabel: $jadwal, $statusLabelPetugas,
            $ikon ('truk' | 'pin'), $warnaNormal ('blue' | 'green'),
            $garisHijau (true = garis kiri hijau jika tidak mendesak)
--}}
@php
  $mendesak = $jadwal->laporan && $jadwal->laporan->prioritas === 'mendesak';
  $statusInfo = $statusLabelPetugas[$jadwal->status];
@endphp
<a href="{{ route('detail.tugas.petugas', $jadwal) }}" class="task-card" style="text-decoration:none; color:inherit; {{ ($garisHijau ?? false) && ! $mendesak ? 'border-left-color:#1eb980;' : '' }}">
  <div class="task-icon {{ $mendesak ? 'red' : $warnaNormal }}">
    @if ($ikon === 'truk')
      <svg viewBox="0 0 24 24"><path d="M14 18V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h1"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62L19 8h-4"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
    @else
      <svg viewBox="0 0 24 24" stroke="currentColor"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
    @endif
  </div>
  <div class="task-body">
    <div class="task-title-row">
      <div class="task-title">{{ $jadwal->tps->nama_tps }}</div>
      @if ($mendesak)
        <span class="badge-mendesak">MENDESAK</span>
      @endif
    </div>
    <div class="task-address">
      <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
      {{ $jadwal->tps->alamat }}
    </div>
    @if ($jadwal->catatan)
      <div class="task-note">"{{ $jadwal->catatan }}"</div>
    @endif
    <div class="task-footer">
      <div class="task-time">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        {{ \Illuminate\Support\Carbon::parse($jadwal->waktu)->format('H:i') }}
      </div>
      <span class="status-pill {{ $statusInfo['kelas'] }}">{{ $statusInfo['label'] }}</span>
    </div>
  </div>
  <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
</a>
