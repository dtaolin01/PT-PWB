<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index(Request $request)
    {
        $resi = strtoupper(trim((string) $request->query('resi', '')));
        $shipment = null;
        $notFound = false;

        if ($resi !== '') {
            $found = Shipment::with(['steps', 'details', 'locations'])
                ->where('resi', $resi)
                ->first();

            if ($found) {
                $shipment = $this->buildShipment($found);
            } else {
                $notFound = true;
            }
        }

        return view('tracking', [
            'resi'     => $resi,
            'shipment' => $shipment,
            'notFound' => $notFound,
            'whatsapp' => config('tracking.whatsapp'),
        ]);
    }

    /**
     * Mengubah data dari database menjadi bentuk yang dibaca oleh tampilan.
     */
    private function buildShipment(Shipment $found): array
    {
        [$etaText, $etaNote] = $this->buildEta($found);

        // Status bertahap
        $steps = $found->steps->map(fn ($step) => [
            'label' => $step->label,
            'date'  => $step->step_date
                ? $step->step_date->copy()->locale('id')->translatedFormat('d M Y')
                : '',
            'done'  => (bool) $step->done,
        ])->all();

        // Detail pengiriman, dikelompokkan per kolom
        $details = $found->details
            ->groupBy('column_no')
            ->sortKeys()
            ->map(fn ($rows) => $rows->map(fn ($row) => [$row->label, $row->value])->all())
            ->values()
            ->all();

        // Peta: pin pengiriman
        $pins = $found->locations
            ->where('type', '!=', 'truck')
            ->map(fn ($loc) => [
                'type' => $loc->type,
                'name' => $loc->name,
                'note' => $loc->note,
                'lat'  => (float) $loc->lat,
                'lng'  => (float) $loc->lng,
            ])->values()->all();

        // Peta: lokasi unit truk
        $trucks = $found->locations
            ->where('type', 'truck')
            ->map(fn ($loc) => [
                'name'       => $loc->name,
                'lat'        => (float) $loc->lat,
                'lng'        => (float) $loc->lng,
                'icon'       => $loc->icon,
                'updated_at' => $loc->recorded_at
                    ? $loc->recorded_at->copy()->locale('id')->translatedFormat('d M Y, H.i T')
                    : null,
            ])->values()->all();

        return [
            'resi'         => $found->resi,
            'status_label' => $found->status_label,
            'status_color' => $found->status_color ?: 'green',
            'eta_text'     => $etaText,
            'eta_note'     => $etaNote,
            'steps'        => $steps,
            'details'      => $details,
            'map'          => ['pins' => $pins, 'trucks' => $trucks],
        ];
    }

    /**
     * Mengembalikan [tanggal estimasi tiba, catatan "X Hari Lagi"].
     */
    private function buildEta(Shipment $found): array
    {
        if (!$found->eta_date) {
            return [null, $found->eta_note];
        }

        $eta = $found->eta_date->copy()->locale('id');
        $etaText = $eta->translatedFormat('d F Y');
        $etaNote = $found->eta_note;

        if ($etaNote === null || $etaNote === '') {
            $days = (int) Carbon::today()->diffInDays($eta->copy()->startOfDay(), false);

            $etaNote = $days > 0
                ? $days . ' Hari Lagi'
                : ($days === 0 ? 'Hari Ini' : 'Terlambat ' . abs($days) . ' Hari');
        }

        return [$etaText, $etaNote];
    }
}
