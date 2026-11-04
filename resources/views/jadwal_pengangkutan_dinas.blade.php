@extends('layout.dinas')

@section('title', 'EcoTrack - Jadwal Pengangkutan')

@section('content')

    <!-- STAT CARDS -->
    <div class="stat-grid">
      @foreach ($statCards as $card)
        @include('partials.stat_card', ['card' => $card])
      @endforeach
    </div>

    @include('partials.filter_bar', [
      'placeholder' => 'Cari berdasarkan TPS atau petugas...',
      'tombol'      => 'Buat Jadwal',
    ])

    <!-- TABLE -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>ID Jadwal</th>
            <th>Tanggal &amp; Waktu</th>
            <th>Lokasi TPS</th>
            <th>Petugas</th>
            <th>Kendaraan</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="scheduleTableBody">
          @foreach ($jadwal as $j)
            <tr data-status="{{ $j['status'] }}" data-search="{{ mb_strtolower($j['id'] . ' ' . $j['tps'] . ' ' . $j['petugas']) }}">
              <td class="id-cell">{{ $j['id'] }}</td>
              <td class="datetime-cell">{{ $j['tanggal'] }}<span class="time">{{ $j['jam'] }}</span></td>
              <td class="lokasi-cell">{{ $j['tps'] }}</td>
              <td class="petugas-cell"><span class="petugas-avatar">{{ mb_strtoupper(mb_substr($j['petugas'], 0, 1)) }}</span>{{ $j['petugas'] }}</td>
              <td class="kendaraan-cell">{{ $j['kendaraan'] }}</td>
              <td><span class="status-pill status-{{ $j['status'] }}">{{ $opsiStatus[$j['status']] }}</span></td>
              <td><a href="#" class="detail-link">Detail ›</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

@endsection
