@extends('layout.petugas')

@section('title', 'EcoTrack - ' . $judul)

@section('content')

  <!-- HERO -->
  <div class="hero">
    <div class="hero-top">
      <div>
        <div class="shift-label">Shift Aktif — {{ $tanggal }}</div>
        <div class="hero-greet">Selamat bertugas, {{ $namaDepan }}</div>
      </div>

      <div class="mini-stats">
        @foreach ($miniStats as $stat)
          <div class="mini-stat">
            <div class="mini-stat-value {{ $stat['kelas'] }}">{{ $stat['nilai'] }}</div>
            <div class="mini-stat-label">{{ $stat['label'] }}</div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="tabs">
      @foreach ($tabs as $kunci => $tab)
        <button type="button" class="tab {{ $loop->first ? 'active' : 'inactive' }}" data-tab="{{ $kunci }}">
          {{ $tab['label'] }} ({{ count($tab['tugas']) }} Tugas)
        </button>
      @endforeach
    </div>
  </div>

  <!-- DAFTAR TUGAS -->
  <div class="main">
    @foreach ($tabs as $kunci => $tab)
      <div data-panel="{{ $kunci }}" @unless ($loop->first) style="display:none;" @endunless>

        <div class="warning-line {{ $tab['rutin'] ? 'rutin' : '' }}">
          @if ($tab['rutin'])
            <svg viewBox="0 0 24 24"><path d="M14 18V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h1"/><path d="M15 18H9"/><path d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.62L19 8h-4"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg>
          @else
            <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
          @endif
          {{ $tab['peringatan'] }}
        </div>

        <div class="task-list">
          @foreach ($tab['tugas'] as $tugas)
            @include('partials.task_card', ['tugas' => $tugas, 'rutin' => $tab['rutin']])
          @endforeach
        </div>

      </div>
    @endforeach
  </div>

@endsection