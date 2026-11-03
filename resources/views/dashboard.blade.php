@extends('layoutsAdmin.app')

@section('page_title', 'Dashboard')
@section('title', 'Dashboard Admin')
@section('subtitle', 'Selamat datang, Admin!')

@section('content')
    {{-- Kartu statistik --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ($stats as $s)
            <div class="rounded-xl border border-pwb-line bg-white p-5">
                <div class="flex items-center gap-4">
                    <span class="flex h-14 w-14 items-center justify-center rounded-full text-xl {{ $s['warna'] }}">
                        <i class="fa-solid {{ $s['ikon'] }}"></i>
                    </span>
                    <div>
                        <p class="text-sm font-bold">{{ $s['label'] }}</p>
                        <p class="text-3xl font-extrabold text-pwb-navy">{{ $s['nilai'] }}</p>
                    </div>
                </div>
                <p class="mt-5 text-xs text-slate-500">
                    <span class="font-bold text-green-600">↑ {{ $s['naik'] }}</span> dari bulan lalu
                </p>
            </div>
        @endforeach
    </div>

    <div class="mt-5 grid grid-cols-1 gap-5 xl:grid-cols-2">
        {{-- Grafik --}}
        <div class="rounded-xl border border-pwb-line bg-white p-5">
            <div class="flex items-center justify-between">
                <h2 class="flex items-center gap-2 font-bold text-pwb-navy">
                    <i class="fa-solid fa-chart-column"></i> Statistik Pengiriman
                </h2>
                <select class="rounded-md border border-pwb-line px-3 py-1.5 text-xs">
                    <option>30 Hari Terakhir</option>
                    <option>7 Hari Terakhir</option>
                </select>
            </div>
            <div class="mt-4 h-72">
                <canvas id="grafikPengiriman"></canvas>
            </div>
        </div>

        {{-- Pengiriman terbaru --}}
        <div class="rounded-xl border border-pwb-line bg-white p-5">
            <div class="flex items-center justify-between">
                <h2 class="flex items-center gap-2 font-bold text-pwb-navy">
                    <i class="fa-solid fa-location-dot"></i> Pengiriman Terbaru
                </h2>
                <a href="{{ route('trackingAdmin') }}" class="text-xs font-bold text-pwb-blue">Lihat Semua →</a>
            </div>

            <ul class="mt-4">
                @foreach ($pengirimanTerbaru as $p)
                    <li class="grid grid-cols-3 items-center py-4">
                        <span class="text-sm">{{ $p['resi'] }}</span>
                        <span><x-badge :warna="$p['warna']">{{ $p['status'] }}</x-badge></span>
                        <span class="text-right text-sm">{{ $p['tanggal'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script>
        new Chart(document.getElementById('grafikPengiriman'), {
            type: 'line',
            data: {
                labels: @json($grafik['label']),
                datasets: [{
                    data: @json($grafik['data']),
                    borderColor: '#2563EB',
                    backgroundColor: 'rgba(37,99,235,0.10)',
                    fill: true,
                    tension: 0,
                    borderWidth: 3,
                    pointRadius: 5,
                    pointBackgroundColor: '#2563EB',
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { min: 0, max: 1000, ticks: { stepSize: 250 }, grid: { color: '#E5EAF3' } },
                    x: { grid: { display: false } }
                }
            }
        });
    </script>
@endpush
