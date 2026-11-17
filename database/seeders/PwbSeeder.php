<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Pengiriman;
use App\Models\Supir;
use App\Models\TrackingEvent;
use App\Models\Truck;
use Illuminate\Database\Seeder;

class PwbSeeder extends Seeder
{
    public function run(): void
    {
        // ---- Supir ----
        $namaSupir = [
            'Budi Santoso', 'Ahmad Fauzi', 'Dedi Kurniawan', 'Agus Pratama', 'Rizky Maulana', 'Hendra Saputra',
            'Joko Susilo', 'Slamet Riyadi', 'Eko Prasetyo', 'Bambang Wijaya', 'Yusuf Hidayat', 'Wahyu Nugroho',
        ];
        $supir = [];
        foreach ($namaSupir as $i => $nama) {
            $supir[] = Supir::forceCreate([
                'nama'       => $nama,
                'telepon'    => '0812'.str_pad((string) (3000000 + $i * 1111), 8, '0', STR_PAD_LEFT),
                'created_at' => now()->subDays(rand(1, 60)),
                'updated_at' => now(),
            ]);
        }

        // ---- Truck: [plat, jenis, kapasitas (ton), status] ----
        $dataTruck = [
            ['B 9347 XY', 'Tronton', 25, 'tersedia'],
            ['B 9123 ZZ', 'Tronton', 25, 'digunakan'],
            ['B 8776 KK', 'Fuso',    15, 'tersedia'],
            ['B 7654 MM', 'Fuso',    15, 'perawatan'],
            ['B 6543 NN', 'Tronton', 25, 'tersedia'],
            ['B 5432 PP', 'Fuso',    15, 'digunakan'],
            ['B 4321 QQ', 'Tronton', 25, 'tersedia'],
            ['B 3210 RR', 'Fuso',    15, 'tersedia'],
            ['B 2109 SS', 'Tronton', 25, 'digunakan'],
            ['B 1098 TT', 'Fuso',    15, 'perawatan'],
            ['B 9876 UU', 'Tronton', 25, 'tersedia'],
            ['B 8765 VV', 'Fuso',    15, 'digunakan'],
        ];
        $trucks = [];
        foreach ($dataTruck as $i => [$plat, $jenis, $ton, $status]) {
            $trucks[] = Truck::forceCreate([
                'foto'          => 'truck-'.(($i % 5) + 1).'.png',
                'plat'          => $plat,
                'jenis'         => $jenis,
                'kapasitas_ton' => $ton,
                'supir_id'      => $supir[$i]->id,
                'status'        => $status,
                'created_at'    => now()->subDays(rand(1, 60)),
                'updated_at'    => now(),
            ]);
        }

        // ---- Pelanggan ----
        $dataPelanggan = [
            ['PT Maju Jaya',       'Budi Santoso', 'majujaya@email.com',       'Jl. Merdeka No. 123, Jakarta'],
            ['CV Bumi Konstruksi', 'Ani Sari',     'bumikonstruksi@email.com', 'Jl. Sudirman No. 45, Bandung'],
            ['PT Prima Logistik',  'Rudi Hartono', 'primalogistik@email.com',  'Jl. Gatot Subroto No. 78, Surabaya'],
            ['PT Sinar Abadi',     'Dewi Lestari', 'sinarabadi@email.com',     'Jl. Diponegoro No. 10, Semarang'],
            ['CV Jaya Teknik',     'Andi Wijaya',  'jayateknik@email.com',     'Jl. Ahmad Yani No. 22, Malang'],
            ['PT Nusantara Steel', 'Hadi Kusuma',  'nusasteel@email.com',      'Jl. Industri No. 5, Bekasi'],
            ['CV Mitra Bangunan',  'Sari Wulandari', 'mitrabangunan@email.com', 'Jl. Pahlawan No. 17, Yogyakarta'],
            ['PT Tirta Makmur',    'Doni Pranata', 'tirtamakmur@email.com',    'Jl. Veteran No. 9, Surabaya'],
        ];
        $pelanggan = [];
        foreach ($dataPelanggan as [$nama, $kontak, $email, $alamat]) {
            $pelanggan[] = Pelanggan::forceCreate([
                'nama' => $nama, 'kontak' => $kontak, 'email' => $email, 'alamat' => $alamat,
                'created_at' => now()->subDays(rand(1, 60)),
                'updated_at' => now(),
            ]);
        }

        // ---- Pengiriman: 40 data tersebar 30 hari terakhir ----
        $tujuan = ['Surabaya', 'Semarang', 'Bandung', 'Malang', 'Yogyakarta', 'Cirebon'];
        $muatan = ['Semen 50kg (25 ton)', 'Besi beton (20 ton)', 'Keramik (15 ton)', 'Pupuk (25 ton)', 'Beras (18 ton)'];
        $nomorPerHari = [];

        for ($n = 0; $n < 40; $n++) {
            $umur    = $n < 2 ? 0 : rand(1, 29);   // 2 pengiriman terbaru = hari ini
            $tanggal = today()->subDays($umur);
            $key     = $tanggal->format('Ymd');
            $nomorPerHari[$key] = ($nomorPerHari[$key] ?? 0) + 1;

            if ($n < 2) {
                $status = 'menunggu';
            } elseif ($umur <= 2) {
                $status = 'dalam_perjalanan';
            } else {
                $status = rand(1, 8) === 1 ? 'tertunda' : 'terkirim';
            }

            $kota = $tujuan[array_rand($tujuan)];
            $p = Pengiriman::forceCreate([
                'no_resi'       => 'PWB-'.$key.'-'.str_pad((string) $nomorPerHari[$key], 4, '0', STR_PAD_LEFT),
                'pelanggan_id'  => $pelanggan[array_rand($pelanggan)]->id,
                'truck_id'      => $trucks[array_rand($trucks)]->id,
                'tujuan'        => $kota,
                'muatan'        => $muatan[array_rand($muatan)],
                'tanggal_kirim' => $tanggal,
                'estimasi_tiba' => $tanggal->copy()->addDay(),
                'status'        => $status,
                'created_at'    => $tanggal,
                'updated_at'    => $tanggal,
            ]);

            // jumlah langkah yang sudah selesai menurut status
            $selesai = ['menunggu' => 1, 'dalam_perjalanan' => 2, 'tertunda' => 2, 'terkirim' => 4][$status];

            $langkah = [
                ['Pengiriman Diterima', $tanggal->copy()->setTime(8, 30),           'Jakarta'],
                ['Dalam Perjalanan',    $tanggal->copy()->setTime(14, 20),          'Tol Trans Jawa'],
                ['Menuju Tujuan',       $tanggal->copy()->addDay()->setTime(8, 0),  null],
                ['Tiba di Tujuan',      $tanggal->copy()->addDay()->setTime(12, 0), null],
            ];

            foreach ($langkah as $i => [$judul, $waktu, $lokasi]) {
                $sudah = $i < $selesai;
                TrackingEvent::forceCreate([
                    'pengiriman_id' => $p->id,
                    'urutan'        => $i + 1,
                    'judul'         => $judul,
                    'waktu'         => $waktu,
                    'lokasi'        => $lokasi ?? ($sudah ? $kota : null),
                    'selesai'       => $sudah,
                    'created_at'    => $tanggal,
                    'updated_at'    => $tanggal,
                ]);
            }
        }
    }
}
