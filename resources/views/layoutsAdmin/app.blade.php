<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title', 'Admin') - Putra Wijaya Berjaya</title>

    {{-- Tailwind via CDN (tanpa build). Kalau nanti pakai Vite, config warna pindah ke tailwind.config.js --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { pwb: { navy: '#12285C', blue: '#2563EB', red: '#D7263D', sky: '#DCEAFB', bg: '#F4F7FC', line: '#DCE3F0' } },
                    fontFamily: { sans: ['Inter', 'Arial', 'sans-serif'] }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @stack('styles')
</head>
<body class="bg-pwb-bg font-sans text-slate-800">
<div class="flex min-h-screen">

    @include('partialsadmin.sidebar')

    <main class="min-w-0 flex-1">
        {{-- Banner atas: avatar admin + judul halaman --}}
        <header class="bg-pwb-sky px-8 pb-6 pt-4">
            <div class="flex items-center justify-end gap-2 text-sm font-semibold text-pwb-navy">
                <span class="h-8 w-8 rounded-full bg-slate-400"></span>
                Admin PWB
                <i class="fa-solid fa-chevron-down text-xs"></i>
            </div>

            <div class="mt-4 flex items-end justify-between">
                <div>
                    <h1 class="text-4xl font-extrabold text-pwb-navy">@yield('title')</h1>
                    <p class="mt-2 text-slate-800">@yield('subtitle')</p>
                </div>
                @yield('banner_action')
            </div>
        </header>

        <section class="p-6">
            @yield('content')
        </section>
    </main>
</div>
@stack('scripts')
</body>
</html>
