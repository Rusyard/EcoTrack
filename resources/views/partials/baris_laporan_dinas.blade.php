<tr
  data-status="{{ $l->status }}"
  data-search="{{ strtolower($l->kode_laporan.' '.$l->pelapor->nama_lengkap.' '.$l->tps->nama_tps) }}"
>
  <td class="id-cell">{{ $l->kode_laporan }}</td>
  <td class="date-cell">{{ $l->tanggal_lapor->format('Y-m-d H:i') }}</td>
  <td class="pelapor-cell">{{ $l->pelapor->nama_lengkap }}</td>
  <td class="lokasi-cell">{{ $l->tps->nama_tps }}</td>
  <td class="desc-cell">{{ \Illuminate\Support\Str::limit($l->deskripsi, 60) }}</td>
  <td>
    @if ($l->foto_url)
      <img
        src="{{ $l->foto_url }}"
        alt="Foto kondisi {{ $l->tps->nama_tps }}"
        class="foto-thumb"
        onclick="bukaLightbox('{{ $l->foto_url }}')"
      >
    @else
      <span class="foto-none">Tanpa foto</span>
    @endif
  </td>
  <td><span class="status-pill status-{{ $l->status }}">{{ ucfirst($l->status) }}</span></td>
  <td>
    @if ($l->status === 'selesai')
      <span class="done-label">✓ Selesai</span>
    @elseif ($l->status === 'dijadwalkan')
      <a href="{{ route('laporan.validasi.show', $l) }}" class="action-btn validasi" style="text-decoration:none; display:inline-block;">Validasi</a>
    @else
      <button
        type="button"
        class="action-btn jadwalkan"
        onclick="bukaModalJadwalkan({{ $l->id }}, '{{ $l->kode_laporan }}', @js($l->tps->nama_tps), @js($l->tps->alamat))"
      >Jadwalkan</button>
    @endif
  </td>
</tr>
