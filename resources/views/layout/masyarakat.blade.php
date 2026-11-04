<!DOCTYPE html>
<html lang="id">
<head>
  @include('partials.header', ['css' => 'resources/css/masyarakat.css'])
</head>
<body>

  @include('partials.navbar_masyarakat')

  @yield('content')

  @include('partials.footer')

</body>
</html>