<tr
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
  <td>
    <button
      type="button"
      class="detail-link detail-btn"
      data-petugas-id="{{ $p->id }}"
      data-petugas="{{ json_encode([
          'id'        => $p->id,
          'nama'      => $p->nama_lengkap,
          'nip'       => $p->nip,
          'kontak'    => $p->kontak,
          'wilayah'   => $p->wilayah_tugas,
          'urlUpdate' => route('keloladata.petugas.update', $p),
          'urlHapus'  => route('keloladata.petugas.destroy', $p),
      ]) }}"
      onclick="bukaDetailPetugas(this)"
    >Detail ›</button>
  </td>
</tr>