<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class TrackingAdminController extends Controller
{
    public function index(Request $request)
    {
        $resi = trim((string) $request->query('resi'));

        $query = Pengiriman::with(['pelanggan', 'truck', 'events']);

        // Tanpa pencarian: tampilkan pengiriman terbaru sebagai contoh
        $pengiriman = $resi !== ''
            ? $query->where('no_resi', $resi)->first()
            : $query->orderByDesc('tanggal_kirim')->orderByDesc('id')->first();

        if (! $pengiriman) {
            return view('trackingAdmin', [
                'resi'           => $resi,
                'detail'         => null,
                'perjalanan'     => [],
                'updateTerakhir' => null,
            ]);
        }

        $detail = [
            'no_resi'   => $pengiriman->no_resi,
            'pelanggan' => $pengiriman->pelanggan->nama,
            'tujuan'    => $pengiriman->tujuan,
            'muatan'    => $pengiriman->muatan,
            'armada'    => $pengiriman->truck
                ? 'Truk '.$pengiriman->truck->jenis.' '.$pengiriman->truck->plat
                : 'Belum ditentukan',
            'estimasi'  => $pengiriman->estimasi_tiba?->locale('id')->translatedFormat('j M Y') ?? '-',
            'status'    => $pengiriman->status_label,
            'warna'     => $pengiriman->status_warna,
        ];

        $perjalanan = $pengiriman->events->map(fn ($e) => [
            'judul'  => $e->judul,
            'waktu'  => $e->waktu ? $e->waktu->locale('id')->translatedFormat('j M Y, H:i').' WIB' : '',
            'lokasi' => $e->lokasi,
            'state'  => $e->selesai ? 'selesai' : 'menunggu',
        ]);

        $terakhir = $pengiriman->events->where('selesai', true)->last();
        $updateTerakhir = $terakhir?->waktu
            ? $terakhir->waktu->locale('id')->translatedFormat('j M Y, H:i').' WIB'
            : '-';

        return view('trackingAdmin', compact('resi', 'detail', 'perjalanan', 'updateTerakhir'));
    }
}
