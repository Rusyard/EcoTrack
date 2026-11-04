<!DOCTYPE html>
<html lang="id">
<head>
  @include('partials.header', ['css' => 'resources/css/petugas.css'])
</head>
<body>

  @include('partials.navbar_petugas')

  @yield('content')

  @include('partials.footer')

</body>
</html>