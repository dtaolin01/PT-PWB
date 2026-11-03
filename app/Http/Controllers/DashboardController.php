<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        // DATA STATIS (dummy). Nanti ganti dengan query Eloquent.
        $stats = [
            ['label' => 'Total Pengiriman', 'nilai' => '1,250', 'naik' => '12%', 'ikon' => 'fa-cube',  'warna' => 'bg-blue-100 text-blue-600'],
            ['label' => 'Total Truck',      'nilai' => '48',    'naik' => '2%',  'ikon' => 'fa-truck', 'warna' => 'bg-red-100 text-red-600'],
            ['label' => 'Total Supir',      'nilai' => '72',    'naik' => '1%',  'ikon' => 'fa-user-tie', 'warna' => 'bg-amber-100 text-amber-600'],
            ['label' => 'Total Pelanggan',  'nilai' => '85',    'naik' => '5%',  'ikon' => 'fa-users', 'warna' => 'bg-green-100 text-green-600'],
        ];

        $grafik = [
            'label' => ['1 Okt', '5 Okt', '9 Okt', '13 Okt', '17 Okt', '21 Okt', '25 Okt', '28 Okt'],
            'data'  => [250, 400, 370, 500, 550, 650, 640, 820],
        ];

        // warna: green | blue | red | amber
        $pengirimanTerbaru = [
            ['resi' => 'PWB-20261026-0048', 'status' => 'Dalam Perjalanan', 'warna' => 'green', 'tanggal' => '26 Okt'],
            ['resi' => 'PWB-20261026-0047', 'status' => 'Terkirim',         'warna' => 'blue',  'tanggal' => '25 Okt'],
            ['resi' => 'PWB-20261026-0046', 'status' => 'Terkirim',         'warna' => 'blue',  'tanggal' => '25 Okt'],
            ['resi' => 'PWB-20261026-0045', 'status' => 'Tertunda',         'warna' => 'red',   'tanggal' => '24 Okt'],
            ['resi' => 'PWB-20261026-0044', 'status' => 'Terkirim',         'warna' => 'blue',  'tanggal' => '24 Okt'],
        ];

        return view('dashboard', compact('stats', 'grafik', 'pengirimanTerbaru'));
    }
}
