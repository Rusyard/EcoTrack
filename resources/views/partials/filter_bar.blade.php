{{-- Dipakai: @include('partials.filter_bar', ['placeholder' => '...', 'tombol' => 'Buat Jadwal']) ; 'tombol' opsional. $opsiStatus datang dari controller. --}}
<div class="filter-bar">
  <div class="search-box">
    <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
    <input type="text" id="searchInput" placeholder="{{ $placeholder }}">
  </div>
  <div class="status-select">
    <select id="statusFilter">
      <option value="semua">Semua Status</option>
      @foreach ($opsiStatus as $nilai => $label)
        <option value="{{ $nilai }}">{{ $label }}</option>
      @endforeach
    </select>
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
  </div>
  @if (isset($tombol))
    <button class="btn-new">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14"/></svg>
      {{ $tombol }}
    </button>
  @endif
</div>
