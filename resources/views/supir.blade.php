@extends('layouts.app')

@section('page_title', 'Data Supir')
@section('title', 'Daftar Supir')
@section('subtitle', 'Kelola data pengemudi perusahaan')

@section('banner_action')
    <div class="flex gap-3">
        <a href="{{ route('truck') }}" class="inline-flex items-center gap-3 rounded-lg border border-pwb-navy px-5 py-3 text-sm font-bold text-pwb-navy hover:bg-white">
            <i class="fa-solid fa-truck"></i> Data Truck
        </a>
        <a href="{{ route('supir.create') }}" class="inline-flex items-center gap-3 rounded-lg bg-pwb-navy px-5 py-3 text-sm font-bold text-white hover:bg-slate-900">
            <i class="fa-solid fa-plus"></i> Tambah Supir
        </a>
    </div>
@endsection

@section('content')
    <form method="GET" action="{{ route('supir') }}" class="flex overflow-hidden rounded-lg border border-pwb-line bg-white">
        <input type="text" name="q" value="{{ $q }}" placeholder="Cari nama supir..."
               class="flex-1 px-4 py-3 text-sm outline-none placeholder:text-slate-400">
        <button type="submit" class="bg-pwb-blue px-5 text-white"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>

    <div class="mt-5 overflow-x-auto rounded-xl bg-white">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100/80 text-xs font-bold text-pwb-navy">
                <tr>
                    <th class="px-4 py-4">No.</th>
                    <th class="px-4 py-4">Nama Supir</th>
                    <th class="px-4 py-4">Telepon</th>
                    <th class="px-4 py-4">Truck</th>
                    <th class="px-4 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-pwb-line">
                @forelse ($supir as $s)
                    <tr>
                        <td class="px-4 py-5">{{ $data->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-5 font-bold">{{ $s['nama'] }}</td>
                        <td class="px-4 py-5">{{ $s['telepon'] }}</td>
                        <td class="px-4 py-5">{{ $s['truck'] }}</td>
                        <td class="px-4 py-5">@include('partialsadmin.aksi', ['edit' => $s['edit'], 'hapus' => $s['hapus'], 'nama' => $s['nama']])</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-slate-500">Tidak ada data supir yang cocok.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('partialsadmin.pagination', ['data' => $data])
@endsection
