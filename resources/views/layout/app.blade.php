<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.header', [
        'css' => trim($__env->yieldContent('css')),
        'js'  => trim($__env->yieldContent('js')),
    ])
</head>
<body>

    @yield('content')

    @include('partials.footer')

</body>
</html>
