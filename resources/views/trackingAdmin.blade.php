@extends('layoutsAdmin.app')

@section('page_title', 'Tracking')
@section('title', 'Tracking Pengiriman')
@section('subtitle', 'Lacak status pengiriman Anda secara real-time')

@section('content')
    {{-- Pencarian resi --}}
    <form action="{{ route('trackingAdmin') }}" method="GET" class="flex overflow-hidden rounded-lg border border-pwb-line bg-white">
        <input type="text" name="resi" value="{{ $resi }}" placeholder="Masukkan nomor resi..."
               class="flex-1 px-4 py-3 text-sm outline-none placeholder:text-slate-400">
        <button type="submit" class="bg-pwb-blue px-6 text-white hover:bg-blue-700">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </form>

    <div class="mt-5 grid grid-cols-1 gap-5 lg:grid-cols-2">
        {{-- Detail pengiriman --}}
        <div class="rounded-xl border border-pwb-line bg-white p-5">
            <div class="flex items-center justify-between">
                <h2 class="flex items-center gap-3 font-bold text-pwb-navy">
                    <i class="fa-solid fa-cube text-lg"></i> Detail Pengiriman
                </h2>
                <x-badge warna="blue">{{ $detail['status'] }}</x-badge>
            </div>

            <dl class="mt-5 space-y-4 text-sm">
                @foreach ([
                    'No. Resi'      => $detail['no_resi'],
                    'Pelanggan'     => $detail['pelanggan'],
                    'Tujuan'        => $detail['tujuan'],
                    'Jenis Muatan'  => $detail['muatan'],
                    'Armada'        => $detail['armada'],
                    'Estimasi Tiba' => $detail['estimasi'],
                ] as $label => $nilai)
                    <div class="grid grid-cols-2">
                        <dt class="text-slate-500">{{ $label }}</dt>
                        <dd class="font-bold">{{ $nilai }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

        {{-- Status perjalanan --}}
        <div class="rounded-xl border border-pwb-line bg-white p-5">
            <h2 class="font-bold text-pwb-navy">Status Perjalanan</h2>

            <ol class="mt-5">
                @foreach ($perjalanan as $step)
                    @php $selesai = $step['state'] === 'selesai'; @endphp
                    <li class="relative flex gap-4 pb-6 last:pb-0">
                        @unless ($loop->last)
                            <span class="absolute left-[15px] top-8 h-full w-0.5 bg-slate-300"></span>
                        @endunless
                        <span class="relative z-10 flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-xs text-white {{ $selesai ? 'bg-pwb-navy' : 'bg-slate-300' }}">
                            @if ($selesai) <i class="fa-solid fa-check"></i> @endif
                        </span>
                        <div>
                            <p class="text-sm font-bold {{ $selesai ? '' : 'text-slate-500' }}">{{ $step['judul'] }}</p>
                            <p class="text-xs {{ $selesai ? 'text-pwb-blue' : 'text-slate-400' }}">{{ $step['waktu'] }}</p>
                            @if ($step['lokasi'])
                                <p class="text-xs text-slate-400">{{ $step['lokasi'] }}</p>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>

    {{-- Peta lokasi terakhir (gambar statis; nanti bisa diganti Leaflet / Google Maps) --}}
    <div class="mt-5 rounded-xl border border-pwb-line bg-white p-5">
        <div class="flex items-center justify-between">
            <h2 class="flex items-center gap-3 font-bold text-pwb-navy">
                <i class="fa-solid fa-location-dot"></i> Lokasi Terakhir
            </h2>
            <span class="text-xs text-slate-500">Update: {{ $updateTerakhir }}</span>
        </div>
        <img src="{{ asset('images/map-rute.png') }}" alt="Peta rute Jakarta - Surabaya" class="mt-4 w-full rounded-lg">
    </div>
@endsection
