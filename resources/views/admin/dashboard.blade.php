<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard - Sistem PWB</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="dashboard-page">
<div class="box">
    <h1>Selamat datang, {{ auth()->user()->email ?? auth()->user()->username }}</h1>
    <p>Dashboard admin PWB (placeholder).</p>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Keluar</button>
    </form>
</div>
</body>
</html>
