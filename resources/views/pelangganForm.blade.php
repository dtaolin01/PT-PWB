@extends('layouts.app')

@section('page_title', $pelanggan->exists ? 'Ubah Pelanggan' : 'Tambah Pelanggan')
@section('title', $pelanggan->exists ? 'Ubah Data Pelanggan' : 'Tambah Pelanggan')
@section('subtitle', 'Lengkapi data pelanggan di bawah ini')

@section('content')
    @php
        $input = 'w-full rounded-lg border border-pwb-line bg-white px-4 py-3 text-sm outline-none focus:border-pwb-blue';
        $label = 'mb-1 block text-sm font-bold text-pwb-navy';
    @endphp

    <form method="POST"
          action="{{ $pelanggan->exists ? route('pelanggan.update', $pelanggan) : route('pelanggan.store') }}"
          class="max-w-3xl rounded-xl border border-pwb-line bg-white p-6">
        @csrf
        @if ($pelanggan->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div class="md:col-span-2">
                <label for="nama" class="{{ $label }}">Nama Perusahaan</label>
                <input id="nama" name="nama" value="{{ old('nama', $pelanggan->nama) }}" class="{{ $input }}">
                @error('nama') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="kontak" class="{{ $label }}">Nama Kontak</label>
                <input id="kontak" name="kontak" value="{{ old('kontak', $pelanggan->kontak) }}" class="{{ $input }}">
                @error('kontak') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="{{ $label }}">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $pelanggan->email) }}" class="{{ $input }}">
                @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label for="alamat" class="{{ $label }}">Alamat</label>
                <textarea id="alamat" name="alamat" rows="3" class="{{ $input }}">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                @error('alamat') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="rounded-lg bg-pwb-blue px-6 py-3 text-sm font-bold text-white hover:bg-blue-700">Simpan</button>
            <a href="{{ route('pelanggan') }}" class="rounded-lg border border-pwb-line px-6 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">Batal</a>
        </div>
    </form>
@endsection
