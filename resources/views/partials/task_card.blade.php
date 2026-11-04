<a @if (!empty($tugas['id'])) href="{{ route('detail.tugas.petugas', $tugas['id']) }}" @endif
   class="task-card {{ $rutin ? 'rutin' : '' }}">

  <div class="task-icon {{ $tugas['warna'] }}">
    @if ($tugas['ikon'] === 'truk')
      <svg viewBox="0 0 24 24"><path d="M14 18V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h1"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62L19 8h-4"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
    @else
      <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
    @endif
  </div>

  <div class="task-body">
    <div class="task-title-row">
      <div class="task-title">{{ $tugas['tps'] }}</div>
      @if ($tugas['mendesak'])
        <span class="badge-mendesak">MENDESAK</span>
      @endif
    </div>

    <div class="task-address">
      <svg viewBox="0 0 24 24"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/></svg>
      {{ $tugas['alamat'] }}
    </div>

    <div class="task-note">"{{ $tugas['catatan'] }}"</div>

    <div class="task-footer">
      <div class="task-time">
        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
        {{ $tugas['jam'] }}
      </div>
      <span class="status-pill status-{{ $tugas['status'] }}">{{ $tugas['status_label'] }}</span>
    </div>
  </div>

  <svg class="chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
</a>