<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q'));

        $data = Pelanggan::query()
            ->when($q !== '', fn ($query) => $query->where('nama', 'like', "%{$q}%"))
            ->orderBy('id')
            ->paginate(5)
            ->withQueryString();

        $pelanggan = $data->getCollection()->map(fn ($p) => [
            'nama'   => $p->nama,
            'kontak' => $p->kontak,
            'email'  => $p->email,
            'alamat' => $p->alamat,
            'edit'   => route('pelanggan.edit', $p),
            'hapus'  => route('pelanggan.destroy', $p),
        ]);

        return view('pelanggan', compact('pelanggan', 'data', 'q'));
    }

    public function create()
    {
        return view('pelangganForm', ['pelanggan' => new Pelanggan()]);
    }

    public function store(Request $request)
    {
        Pelanggan::create($this->validasi($request));

        return redirect()->route('pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function edit(Pelanggan $pelanggan)
    {
        return view('pelangganForm', compact('pelanggan'));
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan->update($this->validasi($request, $pelanggan));

        return redirect()->route('pelanggan')->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    public function destroy(Pelanggan $pelanggan)
    {
        // Jangan hapus pelanggan yang masih punya pengiriman (di migration pengiriman ikut terhapus / cascade)
        if ($pelanggan->pengiriman()->exists()) {
            return redirect()->route('pelanggan')
                ->with('error', 'Pelanggan tidak bisa dihapus karena masih punya data pengiriman.');
        }

        $pelanggan->delete();

        return redirect()->route('pelanggan')->with('success', 'Data pelanggan berhasil dihapus.');
    }

    private function validasi(Request $request, ?Pelanggan $pelanggan = null): array
    {
        return $request->validate([
            'nama'   => ['required', 'string', 'max:150'],
            'kontak' => ['required', 'string', 'max:100'],
            'email'  => ['required', 'email', 'max:150', Rule::unique('pelanggan', 'email')->ignore($pelanggan?->id)],
            'alamat' => ['required', 'string', 'max:255'],
        ], [
            'email.unique' => 'Email sudah dipakai pelanggan lain.',
        ], [
            'nama' => 'nama perusahaan',
        ]);
    }
}
