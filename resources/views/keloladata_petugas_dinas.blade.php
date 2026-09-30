@extends('layout.dinas')

@section('title', 'EcoTrack - Data Petugas')

@section('content')

    <!-- STAT CARDS -->
    <div class="stat-grid">
      @foreach ($statCards as $card)
        @include('partials.stat_card', ['card' => $card])
      @endforeach
    </div>

    @include('partials.filter_bar', ['placeholder' => 'Cari berdasarkan nama atau NIP...'])

    <!-- TABLE -->
    <div class="table-card">
      <table>
        <thead>
          <tr>
            <th>Petugas</th>
            <th>NIP</th>
            <th>Wilayah Tugas</th>
            <th>Kontak</th>
            <th>Kendaraan</th>
            <th>Status</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody id="petugasTableBody">
          @foreach ($petugas as $p)
            <tr data-status="{{ $p['status'] }}" data-search="{{ mb_strtolower($p['nama'] . ' ' . $p['nip'] . ' ' . $p['wilayah']) }}">
              <td>
                <div class="petugas-cell">
                  <span class="petugas-avatar">{{ mb_strtoupper(mb_substr($p['nama'], 0, 1)) }}</span>
                  <div>
                    <div class="petugas-name">{{ $p['nama'] }}</div>
                    <div class="petugas-role">{{ $p['peran'] }}</div>
                  </div>
                </div>
              </td>
              <td class="nip-cell">{{ $p['nip'] }}</td>
              <td class="wilayah-cell">{{ $p['wilayah'] }}</td>
              <td class="kontak-cell">{{ $p['kontak'] }}</td>
              <td class="kendaraan-cell">{{ $p['kendaraan'] }}</td>
              <td><span class="status-pill status-{{ $p['status'] }}">{{ $opsiStatus[$p['status']] }}</span></td>
              <td><a href="#" class="detail-link">Detail ›</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

@endsection
