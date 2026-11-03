@extends('layoutsAdmin.app')

@section('page_title', 'Truck & Supir')
@section('title', 'Daftar Truck & Supir')
@section('subtitle', 'Kelola data kendaraan dan pengemudi perusahaan')

@section('banner_action')
    <a href="#" class="inline-flex items-center gap-3 rounded-lg bg-pwb-navy px-5 py-3 text-sm font-bold text-white hover:bg-slate-900">
        <i class="fa-solid fa-plus"></i> Tambah Data
    </a>
@endsection

@section('content')
    {{-- Filter --}}
    <div class="flex flex-col gap-3 md:flex-row">
        <div class="flex flex-1 overflow-hidden rounded-lg border border-pwb-line bg-white">
            <input type="text" placeholder="Cari nomor polisi, nama supir..."
                   class="flex-1 px-4 py-3 text-sm outline-none placeholder:text-slate-400">
            <button type="button" class="bg-pwb-blue px-5 text-white"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <select class="rounded-lg border border-pwb-line bg-white px-4 py-3 text-sm font-bold md:w-56">
            <option>Semua Jenis</option><option>Tronton</option><option>Fuso</option>
        </select>
        <select class="rounded-lg border border-pwb-line bg-white px-4 py-3 text-sm font-bold md:w-56">
            <option>Semua Status</option><option>Tersedia</option><option>Digunakan</option><option>Perawatan</option>
        </select>
    </div>

    {{-- Tabel --}}
    <div class="mt-5 overflow-x-auto rounded-xl bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100/80 text-xs font-bold text-pwb-navy">
                <tr>
                    <th class="px-4 py-4">No.</th>
                    <th class="px-4 py-4">Foto</th>
                    <th class="px-4 py-4">Nomor Polisi</th>
                    <th class="px-4 py-4">Jenis Truck</th>
                    <th class="px-4 py-4">Kapasitas</th>
                    <th class="px-4 py-4">Nama Supir</th>
                    <th class="px-4 py-4">Status</th>
                    <th class="px-4 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-pwb-line">
                @foreach ($trucks as $t)
                    <tr>
                        <td class="px-4 py-4">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3">
                            <img src="{{ asset('images/'.$t['foto']) }}" alt="Foto {{ $t['plat'] }}" class="h-12 w-[88px] rounded object-cover">
                        </td>
                        <td class="px-4 py-4 font-bold">{{ $t['plat'] }}</td>
                        <td class="px-4 py-4">{{ $t['jenis'] }}</td>
                        <td class="px-4 py-4">{{ $t['kapasitas'] }}</td>
                        <td class="px-4 py-4">{{ $t['supir'] }}</td>
                        <td class="px-4 py-4"><x-badge :warna="$t['warna']" class="w-28">{{ $t['status'] }}</x-badge></td>
                        <td class="px-4 py-4">@include('partialsadmin.aksi')</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('partialsadmin.pagination', ['info' => $info])
@endsection
