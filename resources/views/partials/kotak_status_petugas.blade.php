{{-- Satu kotak status. Variabel: $label, $nilai, $kelas (opsional: proses / mendesak) --}}
<div class="status-box">
  <div class="status-box-label">{{ $label }}</div>
  <div class="status-box-value {{ $kelas ?? '' }}">{{ $nilai }}</div>
</div>
