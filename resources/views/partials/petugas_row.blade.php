{{-- Variabel: $p (nama_lengkap, nip, wilayah_tugas, kontak, status) --}}
<tr
  data-status="{{ $p->status }}"
  data-search="{{ strtolower($p->nama_lengkap.' '.$p->nip.' '.$p->wilayah_tugas) }}"
>
  <td>
    <div class="petugas-cell">
      <span class="petugas-avatar">{{ strtoupper(substr($p->nama_lengkap, 0, 1)) }}</span>
      <div>
        <div class="petugas-name">{{ $p->nama_lengkap }}</div>
        <div class="petugas-role">Petugas Lapangan</div>
      </div>
    </div>
  </td>
  <td class="nip-cell">{{ $p->nip }}</td>
  <td class="wilayah-cell">{{ $p->wilayah_tugas ?? '-' }}</td>
  <td class="kontak-cell">{{ $p->kontak ?? '-' }}</td>
  {{-- Kendaraan ditentukan per-jadwal (tabel jadwal_pengangkutan), bukan
       melekat ke petugas, jadi belum ada kendaraan tetap yang ditampilkan di sini. --}}
  <td class="kendaraan-cell">-</td>
  <td><span class="status-pill status-{{ $p->status }}">{{ ucwords(str_replace('_', ' ', $p->status === 'bertugas' ? 'Sedang Bertugas' : $p->status)) }}</span></td>
  <td><a href="#" class="detail-link">Detail ›</a></td>
</tr>
