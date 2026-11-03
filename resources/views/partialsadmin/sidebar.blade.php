@php
    // [label, nama route, ikon FontAwesome]
    $menus = [
        ['Dashboard',     'dashboard', 'fa-house'],
        ['Tracking',      'trackingAdmin',  'fa-location-dot'],
        ['Truck & Supir', 'truck',     'fa-truck'],
        ['Pelanggan',     'pelanggan', 'fa-users'],
    ];
@endphp

<aside class="relative flex min-h-screen w-64 shrink-0 flex-col overflow-hidden bg-pwb-navy text-white">
    <div class="px-5 pt-8">
        <img src="{{ asset('images/logo-pwb.png') }}" alt="Putra Wijaya Berjaya" class="w-full">
    </div>

    <nav class="mt-12 space-y-2 px-3">
        @foreach ($menus as [$label, $route, $ikon])
            <a href="{{ route($route) }}"
               class="flex items-center gap-4 rounded-lg px-4 py-3 text-sm {{ request()->routeIs($route) ? 'bg-pwb-blue font-bold' : 'font-medium hover:bg-white/10' }}">
                <i class="fa-solid {{ $ikon }} w-5 text-center text-base"></i>
                {{ $label }}
            </a>
        @endforeach
    </nav>

    <a href="#" class="relative z-10 mt-auto flex items-center gap-4 px-7 pb-8 text-sm">
        <i class="fa-solid fa-right-from-bracket w-5 text-center text-base"></i> Logout
    </a>

    {{-- Hiasan segitiga merah di pojok bawah --}}
    <div class="absolute bottom-0 right-0 h-16 w-32 bg-pwb-red" style="clip-path: polygon(100% 0, 100% 100%, 0 100%)"></div>
</aside>
