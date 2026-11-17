@extends('layouts.app')

@section('page_title', $supir->exists ? 'Ubah Supir' : 'Tambah Supir')
@section('title', $supir->exists ? 'Ubah Data Supir' : 'Tambah Data Supir')
@section('subtitle', 'Lengkapi data pengemudi di bawah ini')

@section('content')
    @php
        $input = 'w-full rounded-lg border border-pwb-line bg-white px-4 py-3 text-sm outline-none focus:border-pwb-blue';
        $label = 'mb-1 block text-sm font-bold text-pwb-navy';
    @endphp

    <form method="POST"
          action="{{ $supir->exists ? route('supir.update', $supir) : route('supir.store') }}"
          class="max-w-xl rounded-xl border border-pwb-line bg-white p-6">
        @csrf
        @if ($supir->exists) @method('PUT') @endif

        <div class="space-y-5">
            <div>
                <label for="nama" class="{{ $label }}">Nama Supir</label>
                <input id="nama" name="nama" value="{{ old('nama', $supir->nama) }}" class="{{ $input }}">
                @error('nama') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="telepon" class="{{ $label }}">Telepon (opsional)</label>
                <input id="telepon" name="telepon" value="{{ old('telepon', $supir->telepon) }}" placeholder="0812xxxxxxxx" class="{{ $input }}">
                @error('telepon') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="rounded-lg bg-pwb-blue px-6 py-3 text-sm font-bold text-white hover:bg-blue-700">Simpan</button>
            <a href="{{ route('supir') }}" class="rounded-lg border border-pwb-line px-6 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">Batal</a>
        </div>
    </form>
@endsection
