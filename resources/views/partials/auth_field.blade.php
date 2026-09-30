{{--
  Satu kolom isian (label + ikon + input + pesan error).
  Wajib : id, name, label, ikon (user|lock|mail|check), placeholder
  Opsional: tipe (default text), nilai (isi awal, mis. old('x')), tautan (['teks' => '...', 'href' => '...'])
--}}
@php
  $ikonAuth = [
    'user'  => '<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
    'lock'  => '<rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>',
    'mail'  => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/>',
    'check' => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
  ];
  $tipe = $tipe ?? 'text';
@endphp

<div class="field">
  <div class="field-header">
    <label for="{{ $id }}">{{ $label }}</label>
    @isset($tautan)
      <a href="{{ $tautan['href'] }}" class="forgot-link">{{ $tautan['teks'] }}</a>
    @endisset
  </div>

  <div class="input-group {{ $errors->has($name) ? 'error' : '' }}">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">{!! $ikonAuth[$ikon] !!}</svg>
    <input type="{{ $tipe }}" id="{{ $id }}" name="{{ $name }}" placeholder="{{ $placeholder }}"
           @if ($tipe !== 'password') value="{{ $nilai ?? '' }}" @endif required>
  </div>

  @error($name)
    <div class="error-text show">{{ $message }}</div>
  @enderror
</div>