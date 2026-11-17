@extends('layouts.app')

@section('page_title', 'Pelanggan')
@section('title', 'Daftar Pelanggan')
@section('subtitle', 'Kelola data pelanggan dan mitra bisnis')

@section('banner_action')
    <a href="{{ route('pelanggan.create') }}" class="inline-flex items-center gap-3 rounded-lg bg-pwb-navy px-5 py-3 text-sm font-bold text-white hover:bg-slate-900">
        <i class="fa-solid fa-plus"></i> Tambah Pelanggan
    </a>
@endsection

@section('content')
    {{-- Filter --}}
    <form method="GET" action="{{ route('pelanggan') }}" class="relative">
        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
        <input type="text" name="q" value="{{ $q }}" placeholder="Cari nama perusahaan..."
               class="w-full rounded-lg border border-pwb-line bg-white py-3 pl-11 pr-4 text-sm outline-none placeholder:text-slate-400">
    </form>

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
                @forelse ($pelanggan as $p)
                    <tr>
                        <td class="px-4 py-5">{{ $data->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-5 font-bold">{{ $p['nama'] }}</td>
                        <td class="px-4 py-5">{{ $p['kontak'] }}</td>
                        <td class="px-4 py-5 text-xs text-pwb-blue">{{ $p['email'] }}</td>
                        <td class="px-4 py-5 text-xs">{{ $p['alamat'] }}</td>
                        <td class="px-4 py-5">@include('partialsadmin.aksi', ['edit' => $p['edit'], 'hapus' => $p['hapus'], 'nama' => $p['nama']])</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-slate-500">Tidak ada pelanggan yang cocok.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('partialsadmin.pagination', ['data' => $data])
@endsection
