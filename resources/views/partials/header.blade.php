{{--
  Isi <head> yang sama untuk semua halaman.
  Halaman mengisi lewat @section:
    @section('title', 'EcoTrack - Dashboard')
    @section('css', 'resources/css/nama.css')   (opsional)
    @section('js',  'resources/js/nama.js')     (opsional)
--}}
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'EcoTrack')</title>

@php
  $aset = array_values(array_filter([
    trim($__env->yieldContent('css')),
    trim($__env->yieldContent('js')),
  ]));
@endphp

@if (count($aset))
  @vite($aset)
@endif