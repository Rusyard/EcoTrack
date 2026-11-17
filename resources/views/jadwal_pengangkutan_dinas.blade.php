@extends('layout.dinas')

@section('title', $judul)
@section('css', 'resources/css/jadwal_pengangkutan_dinas.css')
@section('js', 'resources/js/jadwal_pengangkutan_dinas.js')

@section('topbar')
    <div class="topbar">
      <div class="topbar-title">
        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
        Jadwal Pengangkutan
      </div>
      <div class="topbar-right">
        <div class="date-chip">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
          {{ now()->locale('id')->translatedFormat('l, d F Y') }}
        </div>
        @if ($tpsKritis > 0)
        <div class="alert-chip">
          <svg viewBox="0 0 24 24"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z"/><path d="M12 9v4M12 17h.01"/></svg>
          {{ $tpsKritis }} TPS Kritis
        </div>
        @endif
      </div>
    </div>
@endsection

@section('content')
    <!-- STAT CARDS -->
    <div class="stat-grid">
      <div class="stat-card">
        <div class="stat-value blue">{{ $jadwalHariIni }}</div>
        <div class="stat-title">Jadwal Hari Ini</div>
      </div>
      <div class="stat-card">
        <div class="stat-value orange">{{ $berjalan }}</div>
        <div class="stat-title">Sedang Berjalan</div>
      </div>
      <div class="stat-card">
        <div class="stat-value green">{{ $selesai }}</div>
        <div class="stat-title">Selesai</div>
      </div>
      <div class="stat-card">
        <div class="stat-value gray">{{ $dibatalkan }}</div>
        <div class="stat-title">Dibatalkan</div>
      </div>
    </div>

    <!-- FILTER -->
    <div class="filter-bar">
      <div class="search-box">
        <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        <input type="text" id="searchInput" placeholder="Cari berdasarkan TPS atau petugas...">
      </div>
      <div class="status-select">
        <select id="statusFilter">
          <option value="semua">Semua Status</option>
          <option value="terjadwal">Terjadwal</option>
          <option value="berjalan">Sedang Berjalan</option>
          <option value="selesai">Selesai</option>
          <option value="batal">Dibatalkan</option>
        </select>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
      </div>
    </div>

    <!-- TABLE -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>ID Jadwal</th>
            <th>Tanggal &amp; Waktu</th>
            <th>Lokasi TPS</th>
            <th>Petugas</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="scheduleTableBody">
          @php
            $statusJadwal = [
                'terjadwal'  => ['kelas' => 'terjadwal', 'filter' => 'terjadwal', 'label' => 'Terjadwal'],
                'berjalan'   => ['kelas' => 'berjalan',  'filter' => 'berjalan',  'label' => 'Sedang Berjalan'],
                'selesai'    => ['kelas' => 'selesai',   'filter' => 'selesai',   'label' => 'Selesai'],
                'dibatalkan' => ['kelas' => 'batal',     'filter' => 'batal',     'label' => 'Dibatalkan'],
            ];
          @endphp
          @forelse ($jadwal as $j)
            @php
              $st = $statusJadwal[$j->status] ?? ['kelas' => 'batal', 'filter' => $j->status, 'label' => ucfirst($j->status)];
              $namaPetugas = $j->petugas->nama_lengkap ?? '-';
            @endphp
            <tr data-status="{{ $st['filter'] }}" data-search="{{ \Illuminate\Support\Str::lower($j->kode_jadwal.' '.($j->tps->nama_tps ?? '').' '.$namaPetugas) }}">
              <td class="id-cell">{{ $j->kode_jadwal }}</td>
              <td class="datetime-cell">{{ $j->tanggal->locale('id')->translatedFormat('d M Y') }}<span class="time">{{ substr($j->waktu, 0, 5) }}</span></td>
              <td class="lokasi-cell">{{ $j->tps->nama_tps ?? '-' }}</td>
              <td class="petugas-cell"><span class="petugas-avatar">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($namaPetugas, 0, 1)) }}</span>{{ $namaPetugas }}</td>
              <td><span class="status-pill status-{{ $st['kelas'] }}">{{ $st['label'] }}</span></td>
              <td>
                @if ($j->laporan)
                  <a href="{{ route('laporan.validasi.show', $j->laporan) }}" class="detail-link">Detail ›</a>
                @else
                  <span style="color:#9ca3af;">-</span>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" style="text-align:center; color:#9ca3af; padding:28px 20px;">Belum ada jadwal pengangkutan. Jadwalkan dulu dari halaman Laporan Masuk.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </main>

</div>

<script>
  const searchInput = document.getElementById('searchInput');
  const statusFilter = document.getElementById('statusFilter');
  const rows = document.querySelectorAll('#scheduleTableBody tr[data-status]');

  function applyFilters() {
    const query = searchInput.value.trim().toLowerCase();
    const status = statusFilter.value;

    rows.forEach(row => {
      const matchesSearch = row.dataset.search.includes(query);
      const matchesStatus = status === 'semua' || row.dataset.status === status;
      row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
    });
  }

  searchInput.addEventListener('input', applyFilters);
  statusFilter.addEventListener('change', applyFilters);
</script>

</body>
</html>
