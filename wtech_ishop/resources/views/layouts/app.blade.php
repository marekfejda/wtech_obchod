<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'iSHOP')</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    {{-- Priestor pre CSS stránky --}}
    @yield('page-css')
</head>

<body class="d-flex flex-column min-vh-100">

    {{-- Header --}}
    @include('partials.header')

    {{-- Tu pôjde obsah konkrétnej stránky --}}
    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Bootstrap + JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Priestor pre JS konkrétnej stránky --}}
    @yield('page-js')
</body>
</html>
