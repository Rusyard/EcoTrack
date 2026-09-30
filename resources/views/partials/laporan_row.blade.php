{{-- Variabel: $laporan = ['kode','tanggal','tps','deskripsi','status','status_label'] --}}
<tr>
  <td class="id-cell">{{ $laporan['kode'] }}</td>
  <td>{{ $laporan['tanggal'] }}</td>
  <td>{{ $laporan['tps'] }}</td>
  <td class="desc-cell">{{ $laporan['deskripsi'] }}</td>
  <td><span class="status-pill status-{{ $laporan['status'] }}">{{ $laporan['status_label'] }}</span></td>
  <td><a href="#" class="detail-link">Detail ›</a></td>
</tr>