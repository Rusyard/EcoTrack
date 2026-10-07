{{-- Variabel: $riwayat = array of ['kode','tanggal','tps','deskripsi','status','status_label'] --}}
<div class="history-card">
  <div class="history-header">
    <div class="history-title">Histori Laporan Saya</div>
  </div>

  <table>
    <thead>
      <tr>
        <th>ID Laporan</th>
        <th>Tanggal</th>
        <th>Lokasi TPS</th>
        <th>Deskripsi</th>
        <th>Status</th>
        <th>Tindakan</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($riwayat as $laporan)
        <tr>
          <td class="id-cell">{{ $laporan['kode'] }}</td>
          <td>{{ $laporan['tanggal'] }}</td>
          <td>{{ $laporan['tps'] }}</td>
          <td class="desc-cell">{{ $laporan['deskripsi'] }}</td>
          <td><span class="status-pill status-{{ $laporan['status'] }}">{{ $laporan['status_label'] }}</span></td>
          <td><a href="#" class="detail-link">Detail ›</a></td>
        </tr>
      @empty
        <tr>
          <td colspan="6" class="desc-cell">Belum ada laporan.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>