<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Sistem PWB') - Putra Wijaya Berjaya</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<header class="topbar">
    <div class="brand">
        <img src="{{ asset('images/pwb-logo.png') }}" alt="PWB">
        <div class="brand-text">
            <div class="name">PUTRA WIJAYA BERJAYA</div>
            <div class="sub">Logistics &amp; Distribution</div>
        </div>
    </div>
</header>

<main class="hero">
    <section class="welcome">
        <div class="tag"><span class="line"></span> Sistem PWB</div>
        <h1>Selamat datang di <em>Sistem PWB</em></h1>
        <p>Akses cepat dan aman untuk mengelola pengiriman material konstruksi Anda.</p>
    </section>

    <section class="card">
        <div class="brand">
            <img src="{{ asset('images/pwb-logo.png') }}" alt="PWB">
            <div class="brand-text">
                <div class="name">PUTRA WIJAYA BERJAYA</div>
                <div class="sub">Logistics &amp; Distribution</div>
            </div>
        </div>
        @yield('card')
    </section>
</main>

<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
