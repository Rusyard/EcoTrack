<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.header', [
        'css' => trim($__env->yieldContent('css')),
        'js'  => trim($__env->yieldContent('js')),
    ])
</head>
<body>

<div class="layout">

  @include('partials.sidebar_dinas')

  <main class="content">

    @yield('topbar')

    @yield('content')

  </main>

</div>

@include('partials.footer')
</body>
</html>
