<?php

namespace App\Http\Controllers;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = [
            ['nama' => 'PT Maju Jaya',        'kontak' => 'Budi Santoso', 'email' => 'majujaya@email.com',        'alamat' => 'Jl. Merdeka No. 123, Jakarta'],
            ['nama' => 'CV Bumi Konstruksi',  'kontak' => 'Ani Sari',     'email' => 'bumikonstruksi@email.com',  'alamat' => 'Jl. Sudirman No. 45, Bandung'],
            ['nama' => 'PT Prima Logistik',   'kontak' => 'Rudi Hartono', 'email' => 'primalogistik@email.com',   'alamat' => 'Jl. Gatot Subroto No. 78, Surabaya'],
            ['nama' => 'PT Sinar Abadi',      'kontak' => 'Dewi Lestari', 'email' => 'sinarabadi@email.com',      'alamat' => 'Jl. Diponegoro No. 10, Semarang'],
            ['nama' => 'CV Jaya Teknik',      'kontak' => 'Andi Wijaya',  'email' => 'jayateknik@email.com',      'alamat' => 'Jl. Ahmad Yani No. 22, Malang'],
        ];

        $info = 'Menampilkan 1-5 dari 15 data';

        return view('pelanggan', compact('pelanggan', 'info'));
    }
}
