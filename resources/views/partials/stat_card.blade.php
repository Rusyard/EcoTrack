{{--
  Variabel: $nilai, $judul, $warna = blue | green | orange | red | gray
  Opsional: $sub (teks kecil di bawah judul), $bahaya (true = kartu bernuansa merah)
--}}
<div class="stat-card {{ ($bahaya ?? false) ? 'danger' : '' }}">
  <div class="stat-value {{ $warna }}">{{ $nilai }}</div>
  <div class="stat-title">{{ $judul }}</div>
  @isset($sub)
    <div class="stat-sub">{{ $sub }}</div>
  @endisset
</div>
