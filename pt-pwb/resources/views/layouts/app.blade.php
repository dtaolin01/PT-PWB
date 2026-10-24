<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Putra Wijaya Berjaya')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/pwb-navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pwb-footer.css') }}?v={{ filemtime(public_path('css/pwb-footer.css')) }}">

    @stack('styles')
</head>
<script src="{{ asset('js/pwb-navbar.js') }}?v={{ filemtime(public_path('js/pwb-navbar.js')) }}" defer></script>
<body id="top" class="@yield('body_class')">
@include('partials.navbar')

<main>
    @yield('content')
</main>
@include('partials.footer')
<script src="{{ asset('js/pwb-navbar.js') }}" defer></script>
@stack('scripts')
</body>
</html>
