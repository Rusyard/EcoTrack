@extends('layout.dinas')

@section('title', 'EcoTrack - Kelola Laporan Masyarakat')

@section('content')

    @include('partials.filter_bar', ['placeholder' => 'Cari berdasarkan TPS atau nama pelapor...'])

    <!-- TABLE -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Pelapor</th>
            <th>Lokasi TPS</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="reportTableBody">
          @foreach ($laporan as $l)
            <tr data-status="{{ $l['status'] }}" data-search="{{ mb_strtolower($l['id'] . ' ' . $l['pelapor'] . ' ' . $l['lokasi']) }}">
              <td class="id-cell">{{ $l['id'] }}</td>
              <td class="date-cell">{{ $l['tanggal'] }}</td>
              <td class="pelapor-cell">{{ $l['pelapor'] }}</td>
              <td class="lokasi-cell">{{ $l['lokasi'] }}</td>
              <td class="desc-cell">{{ $l['deskripsi'] }}</td>
              <td><span class="status-pill status-{{ $l['status'] }}">{{ $opsiStatus[$l['status']] }}</span></td>
              <td>
                @if ($l['status'] === 'menunggu')
                  <button class="action-btn jadwalkan">Jadwalkan</button>
                @elseif ($l['status'] === 'dijadwalkan')
                  <button class="action-btn validasi">Validasi</button>
                @else
                  <span class="done-label">✓ Selesai</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

@endsection
