<?php

namespace App\Http\Controllers;

use App\Models\Supir;
use App\Models\Truck;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TruckController extends Controller
{
    public function index(Request $request)
    {
        $q      = trim((string) $request->query('q'));
        $jenis  = (string) $request->query('jenis');
        $status = (string) $request->query('status');

        $data = Truck::with('supir')
            ->when($q !== '', fn ($query) => $query->where(function ($w) use ($q) {
                $w->where('plat', 'like', "%{$q}%")
                  ->orWhereHas('supir', fn ($s) => $s->where('nama', 'like', "%{$q}%"));
            }))
            ->when($jenis !== '', fn ($query) => $query->where('jenis', $jenis))
            ->when($status !== '', fn ($query) => $query->where('status', $status))
            ->orderBy('id')
            ->paginate(5)
            ->withQueryString();

        $trucks = $data->getCollection()->map(fn ($t) => [
            'foto'      => $t->foto ?? 'truck-1.png',
            'plat'      => $t->plat,
            'jenis'     => $t->jenis,
            'kapasitas' => $t->kapasitas_ton.' Ton',
            'supir'     => $t->supir?->nama ?? '-',
            'status'    => $t->status_label,
            'warna'     => $t->status_warna,
            'edit'      => route('truck.edit', $t),
            'hapus'     => route('truck.destroy', $t),
        ]);

        return view('truck', compact('trucks', 'data', 'q', 'jenis', 'status'));
    }

    public function create()
    {
        return view('truckForm', [
            'truck' => new Truck(['status' => 'tersedia']),
            'supir' => Supir::orderBy('nama')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validasi($request);
        unset($data['foto']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $this->simpanFoto($request->file('foto'));
        }

        Truck::create($data);

        return redirect()->route('truck')->with('success', 'Data truck berhasil ditambahkan.');
    }

    public function edit(Truck $truck)
    {
        return view('truckForm', [
            'truck' => $truck,
            'supir' => Supir::orderBy('nama')->get(),
        ]);
    }

    public function update(Request $request, Truck $truck)
    {
        $data = $this->validasi($request, $truck);
        unset($data['foto']);

        if ($request->hasFile('foto')) {
            $this->hapusFoto($truck);
            $data['foto'] = $this->simpanFoto($request->file('foto'));
        }

        $truck->update($data);

        return redirect()->route('truck')->with('success', 'Data truck berhasil diperbarui.');
    }

    public function destroy(Truck $truck)
    {
        $this->hapusFoto($truck);
        $truck->delete();

        return redirect()->route('truck')->with('success', 'Data truck berhasil dihapus.');
    }

    private function validasi(Request $request, ?Truck $truck = null): array
    {
        return $request->validate([
            'plat'          => ['required', 'string', 'max:20', Rule::unique('trucks', 'plat')->ignore($truck?->id)],
            'jenis'         => ['required', Rule::in(Truck::JENIS)],
            'kapasitas_ton' => ['required', 'integer', 'min:1', 'max:100'],
            'supir_id'      => ['nullable', 'exists:supir,id', Rule::unique('trucks', 'supir_id')->ignore($truck?->id)],
            'status'        => ['required', Rule::in(array_keys(Truck::STATUS))],
            'foto'          => ['nullable', 'image', 'max:2048'],
        ], [
            'plat.unique'     => 'Nomor polisi sudah terdaftar.',
            'supir_id.unique' => 'Supir ini sudah terhubung ke truck lain.',
        ], [
            'plat'          => 'nomor polisi',
            'jenis'         => 'jenis truck',
            'kapasitas_ton' => 'kapasitas',
            'supir_id'      => 'supir',
        ]);
    }

    /** Foto upload disimpan di public/images/trucks (tanpa perlu storage:link). */
    private function simpanFoto(UploadedFile $file): string
    {
        $nama = Str::uuid().'.'.$file->extension();
        $file->move(public_path('images/trucks'), $nama);

        return 'trucks/'.$nama;
    }

    /** Hanya hapus foto hasil upload, bukan foto bawaan (truck-1.png dst). */
    private function hapusFoto(Truck $truck): void
    {
        if ($truck->foto && str_starts_with($truck->foto, 'trucks/')) {
            File::delete(public_path('images/'.$truck->foto));
        }
    }
}
