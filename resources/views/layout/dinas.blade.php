<!DOCTYPE html>
<html lang="id">
<head>
  @include('partials.header', ['css' => 'resources/css/dinas.css'])
</head>
<body>

<div class="layout">

  @include('partials.navbar_dinas')

  <main class="content">
    @include('partials.topbar')

    @yield('content')
  </main>

</div>

</body>
</html>
