<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pengiriman;
use App\Models\Supir;
use App\Models\Truck;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            $this->kartu('Total Pengiriman', Pengiriman::class, 'fa-cube',     'bg-blue-100 text-blue-600'),
            $this->kartu('Total Truck',      Truck::class,      'fa-truck',    'bg-red-100 text-red-600'),
            $this->kartu('Total Supir',      Supir::class,      'fa-user-tie', 'bg-amber-100 text-amber-600'),
            $this->kartu('Total Pelanggan',  Pelanggan::class,  'fa-users',    'bg-green-100 text-green-600'),
        ];

        // Grafik: jumlah pengiriman per hari selama 30 hari terakhir
        $perHari = Pengiriman::where('tanggal_kirim', '>=', today()->subDays(29))
            ->selectRaw('tanggal_kirim as tgl, COUNT(*) as total')
            ->groupBy('tanggal_kirim')
            ->pluck('total', 'tgl');

        $label = [];
        $data  = [];
        for ($i = 29; $i >= 0; $i--) {
            $hari    = today()->subDays($i);
            $label[] = $hari->locale('id')->translatedFormat('j M');
            $data[]  = (int) ($perHari[$hari->format('Y-m-d')] ?? 0);
        }
        $grafik = ['label' => $label, 'data' => $data];

        $pengirimanTerbaru = Pengiriman::orderByDesc('tanggal_kirim')
            ->orderByDesc('id')
            ->limit(5)
            ->get()
            ->map(fn ($p) => [
                'resi'    => $p->no_resi,
                'status'  => $p->status_label,
                'warna'   => $p->status_warna,
                'tanggal' => $p->tanggal_kirim->locale('id')->translatedFormat('j M'),
            ]);

        return view('dashboard', compact('stats', 'grafik', 'pengirimanTerbaru'));
    }

    /** Satu kartu statistik: total + perubahan data baru dibanding bulan lalu. */
    private function kartu(string $label, string $model, string $ikon, string $warna): array
    {
        $bulanIni  = $model::where('created_at', '>=', now()->startOfMonth())->count();
        $bulanLalu = $model::whereBetween('created_at', [
            now()->subMonthNoOverflow()->startOfMonth(),
            now()->subMonthNoOverflow()->endOfMonth(),
        ])->count();

        $persen = $bulanLalu > 0
            ? round(($bulanIni - $bulanLalu) / $bulanLalu * 100)
            : ($bulanIni > 0 ? 100 : 0);

        return [
            'label' => $label,
            'nilai' => number_format($model::count(), 0, ',', '.'),
            'naik'  => abs($persen).'%',
            'turun' => $persen < 0,
            'ikon'  => $ikon,
            'warna' => $warna,
        ];
    }
}
