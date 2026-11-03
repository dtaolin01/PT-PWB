<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingAdminController extends Controller
{
    public function index(Request $request)
    {
        // Nomor resi dari form pencarian (?resi=...). Sementara data tetap statis.
        $resi = $request->query('resi');

        $detail = [
            'no_resi'   => 'PWB-20261026-0048',
            'pelanggan' => 'PT. Maju Jaya',
            'tujuan'    => 'Surabaya',
            'muatan'    => 'Semen 50kg (25 ton)',
            'armada'    => 'Truk Tronton BE 9347 XY',
            'estimasi'  => '27 Okt 2026',
            'status'    => 'Dalam Perjalanan',
        ];

        // state: selesai | berjalan | menunggu
        $perjalanan = [
            ['judul' => 'Pengiriman Diterima', 'waktu' => '26 Okt 2026, 08:30 WIB', 'lokasi' => 'Jakarta',        'state' => 'selesai'],
            ['judul' => 'Dalam Perjalanan',    'waktu' => '26 Okt 2026, 14:20 WIB', 'lokasi' => 'Tol Trans Jawa', 'state' => 'selesai'],
            ['judul' => 'Menuju Tujuan',       'waktu' => '27 Okt 2026, 08:00 WIB', 'lokasi' => null,             'state' => 'menunggu'],
            ['judul' => 'Tiba di Tujuan',      'waktu' => '27 Okt 2026, 12:00 WIB', 'lokasi' => null,             'state' => 'menunggu'],
        ];

        $updateTerakhir = '26 Okt 2026, 14:20 WIB';

        return view('trackingAdmin', compact('resi', 'detail', 'perjalanan', 'updateTerakhir'));
    }
}
