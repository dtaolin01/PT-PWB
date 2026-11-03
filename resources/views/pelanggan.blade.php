@extends('layoutsAdmin.app')

@section('page_title', 'Pelanggan')
@section('title', 'Daftar Pelanggan')
@section('subtitle', 'Kelola data pelanggan dan mitra bisnis')

@section('banner_action')
    <a href="#" class="inline-flex items-center gap-3 rounded-lg bg-pwb-navy px-5 py-3 text-sm font-bold text-white hover:bg-slate-900">
        <i class="fa-solid fa-plus"></i> Tambah Pelanggan
    </a>
@endsection

@section('content')
    {{-- Filter --}}
    <div class="flex flex-col gap-3 md:flex-row">
        <div class="relative flex-1">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
            <input type="text" placeholder="Cari nama perusahaan..."
                   class="w-full rounded-lg border border-pwb-line bg-white py-3 pl-11 pr-4 text-sm outline-none placeholder:text-slate-400">
        </div>
        <select class="rounded-lg border border-pwb-line bg-white px-4 py-3 text-sm font-bold md:w-60">
            <option>Semua Kategori</option>
        </select>
    </div>

    {{-- Tabel --}}
    <div class="mt-5 overflow-x-auto rounded-xl bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100/80 text-xs font-bold text-pwb-navy">
                <tr>
                    <th class="px-4 py-4">No.</th>
                    <th class="px-4 py-4">Nama Perusahaan</th>
                    <th class="px-4 py-4">Kontak</th>
                    <th class="px-4 py-4">Email</th>
                    <th class="px-4 py-4">Alamat</th>
                    <th class="px-4 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-pwb-line">
                @foreach ($pelanggan as $p)
                    <tr>
                        <td class="px-4 py-5">{{ $loop->iteration }}</td>
                        <td class="px-4 py-5 font-bold">{{ $p['nama'] }}</td>
                        <td class="px-4 py-5">{{ $p['kontak'] }}</td>
                        <td class="px-4 py-5 text-xs text-pwb-blue">{{ $p['email'] }}</td>
                        <td class="px-4 py-5 text-xs">{{ $p['alamat'] }}</td>
                        <td class="px-4 py-5">@include('partialsadmin.aksi')</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('partialsadmin.pagination', ['info' => $info])
@endsection
