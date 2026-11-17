<?php

namespace App\Http\Controllers;

use App\Models\Supir;
use Illuminate\Http\Request;

class SupirController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q'));

        $data = Supir::with('trucks')
            ->when($q !== '', fn ($query) => $query->where('nama', 'like', "%{$q}%"))
            ->orderBy('id')
            ->paginate(5)
            ->withQueryString();

        $supir = $data->getCollection()->map(fn ($s) => [
            'nama'    => $s->nama,
            'telepon' => $s->telepon ?: '-',
            'truck'   => $s->trucks->pluck('plat')->join(', ') ?: '-',
            'edit'    => route('supir.edit', $s),
            'hapus'   => route('supir.destroy', $s),
        ]);

        return view('supir', compact('supir', 'data', 'q'));
    }

    public function create()
    {
        return view('supirForm', ['supir' => new Supir()]);
    }

    public function store(Request $request)
    {
        Supir::create($this->validasi($request));

        return redirect()->route('supir')->with('success', 'Data supir berhasil ditambahkan.');
    }

    public function edit(Supir $supir)
    {
        return view('supirForm', compact('supir'));
    }

    public function update(Request $request, Supir $supir)
    {
        $supir->update($this->validasi($request));

        return redirect()->route('supir')->with('success', 'Data supir berhasil diperbarui.');
    }

    public function destroy(Supir $supir)
    {
        // truck.supir_id otomatis jadi NULL (nullOnDelete di migration)
        $supir->delete();

        return redirect()->route('supir')->with('success', 'Data supir berhasil dihapus.');
    }

    private function validasi(Request $request): array
    {
        return $request->validate([
            'nama'    => ['required', 'string', 'max:100'],
            'telepon' => ['nullable', 'regex:/^[0-9+\-\s]+$/', 'max:20'],
        ], [
            'telepon.regex' => 'Nomor telepon hanya boleh berisi angka, spasi, + dan -.',
        ]);
    }
}
