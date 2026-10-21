<tr data-status="{{ $j['status'] }}" data-search="{{ strtolower($j['kode'].' '.$j['tps'].' '.$j['petugas']) }}">
  <td class="id-cell">{{ $j['kode'] }}</td>
  <td class="datetime-cell">{{ $j['tanggal'] }}<span class="time">{{ $j['waktu'] }}</span></td>
  <td class="lokasi-cell">{{ $j['tps'] }}</td>
  <td class="petugas-cell"><span class="petugas-avatar">{{ strtoupper(substr($j['petugas'], 0, 1)) }}</span>{{ $j['petugas'] }}</td>
  <td class="kendaraan-cell">{{ $j['kendaraan'] }}</td>
  <td><span class="status-pill status-{{ $j['status'] }}">{{ $labelStatus[$j['status']] }}</span></td>
  <td><a href="#" class="detail-link">Detail ›</a></td>
</tr>
