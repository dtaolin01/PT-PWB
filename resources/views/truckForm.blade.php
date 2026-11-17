@extends('layouts.app')

@section('page_title', $truck->exists ? 'Ubah Truck' : 'Tambah Truck')
@section('title', $truck->exists ? 'Ubah Data Truck' : 'Tambah Data Truck')
@section('subtitle', 'Lengkapi data kendaraan di bawah ini')

@section('content')
    @php
        $input = 'w-full rounded-lg border border-pwb-line bg-white px-4 py-3 text-sm outline-none focus:border-pwb-blue';
        $label = 'mb-1 block text-sm font-bold text-pwb-navy';
    @endphp

    <form method="POST"
          action="{{ $truck->exists ? route('truck.update', $truck) : route('truck.store') }}"
          enctype="multipart/form-data"
          class="max-w-3xl rounded-xl border border-pwb-line bg-white p-6">
        @csrf
        @if ($truck->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div>
                <label for="plat" class="{{ $label }}">Nomor Polisi</label>
                <input id="plat" name="plat" value="{{ old('plat', $truck->plat) }}" placeholder="B 1234 XY" class="{{ $input }}">
                @error('plat') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="jenis" class="{{ $label }}">Jenis Truck</label>
                <select id="jenis" name="jenis" class="{{ $input }}">
                    <option value="">Pilih jenis</option>
                    @foreach (\App\Models\Truck::JENIS as $j)
                        <option value="{{ $j }}" @selected(old('jenis', $truck->jenis) === $j)>{{ $j }}</option>
                    @endforeach
                </select>
                @error('jenis') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="kapasitas_ton" class="{{ $label }}">Kapasitas (Ton)</label>
                <input id="kapasitas_ton" type="number" min="1" max="100" name="kapasitas_ton"
                       value="{{ old('kapasitas_ton', $truck->kapasitas_ton) }}" class="{{ $input }}">
                @error('kapasitas_ton') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="status" class="{{ $label }}">Status</label>
                <select id="status" name="status" class="{{ $input }}">
                    @foreach (\App\Models\Truck::STATUS as $kode => [$nama])
                        <option value="{{ $kode }}" @selected(old('status', $truck->status) === $kode)>{{ $nama }}</option>
                    @endforeach
                </select>
                @error('status') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label for="supir_id" class="{{ $label }}">Supir</label>
                <select id="supir_id" name="supir_id" class="{{ $input }}">
                    <option value="">Belum ada supir</option>
                    @foreach ($supir as $s)
                        <option value="{{ $s->id }}" @selected((string) old('supir_id', $truck->supir_id) === (string) $s->id)>{{ $s->nama }}</option>
                    @endforeach
                </select>
                @error('supir_id') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                <p class="mt-1 text-xs text-slate-500">Supir baru? Tambahkan dulu di <a href="{{ route('supir.create') }}" class="font-bold text-pwb-blue">Data Supir</a>.</p>
            </div>

            <div class="md:col-span-2">
                <label for="foto" class="{{ $label }}">Foto Truck (opsional, maks. 2 MB)</label>
                @if ($truck->foto)
                    <img src="{{ asset('images/'.$truck->foto) }}" alt="Foto saat ini" class="mb-3 h-24 rounded object-cover">
                @endif
                <input id="foto" type="file" name="foto" accept="image/*" class="{{ $input }}">
                @error('foto') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="rounded-lg bg-pwb-blue px-6 py-3 text-sm font-bold text-white hover:bg-blue-700">Simpan</button>
            <a href="{{ route('truck') }}" class="rounded-lg border border-pwb-line px-6 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">Batal</a>
        </div>
    </form>
@endsection
