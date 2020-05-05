<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo') - {{ $configuracion->titulo }}</title>
    <meta name="description" content="{{ $configuracion->descripcion }}">

    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if ($configuracion->favicon)
        <link rel="icon" type="image/png" href="{{ $configuracion->favicon }}">
    @endif

    @include('front.include.css')
</head>
<body>
<!--[if lt IE 10]>
    <p class="browserupgrade">Usted está utilizando una versión antigua de su navegador. Por favor, actualice ahora para mejorar la experiencia.</p>
<![endif]-->

    @include('front.layouts.header')

    @yield('contenido')

    @include('front.layouts.footer')

    @include('front.include.js')
</body>
</html>

