<?php

namespace App\Http\Controllers;

class TruckController extends Controller
{
    public function index()
    {
        // warna status: green | blue | amber
        $trucks = [
            ['foto' => 'truck-1.png', 'plat' => 'B 9347 XY', 'jenis' => 'Tronton', 'kapasitas' => '25 Ton', 'supir' => 'Budi Santoso',   'status' => 'Tersedia',  'warna' => 'green'],
            ['foto' => 'truck-2.png', 'plat' => 'B 9123 ZZ', 'jenis' => 'Tronton', 'kapasitas' => '25 Ton', 'supir' => 'Ahmad Fauzi',    'status' => 'Digunakan', 'warna' => 'blue'],
            ['foto' => 'truck-3.png', 'plat' => 'B 8776 KK', 'jenis' => 'Fuso',    'kapasitas' => '15 Ton', 'supir' => 'Dedi Kurniawan', 'status' => 'Tersedia',  'warna' => 'green'],
            ['foto' => 'truck-4.png', 'plat' => 'B 7654 MM', 'jenis' => 'Fuso',    'kapasitas' => '15 Ton', 'supir' => 'Agus Pratama',   'status' => 'Perawatan', 'warna' => 'amber'],
            ['foto' => 'truck-5.png', 'plat' => 'B 6543 NN', 'jenis' => 'Tronton', 'kapasitas' => '25 Ton', 'supir' => 'Rizky Maulana',  'status' => 'Tersedia',  'warna' => 'green'],
        ];

        $info = 'Menampilkan 1-5 dari 20 data';

        return view('truck', compact('trucks', 'info'));
    }
}
