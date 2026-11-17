<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';

    protected $fillable = [
        'no_resi', 'pelanggan_id', 'truck_id', 'tujuan', 'muatan',
        'tanggal_kirim', 'estimasi_tiba', 'status',
    ];

    protected $casts = [
        'tanggal_kirim' => 'date',
        'estimasi_tiba' => 'date',
    ];

    // status => [label, warna badge]
    public const STATUS = [
        'menunggu'         => ['Menunggu',         'amber'],
        'dalam_perjalanan' => ['Dalam Perjalanan', 'green'],
        'terkirim'         => ['Terkirim',         'blue'],
        'tertunda'         => ['Tertunda',         'red'],
    ];

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function truck(): BelongsTo
    {
        return $this->belongsTo(Truck::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(TrackingEvent::class)->orderBy('urutan');
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUS[$this->status][0] ?? ucfirst($this->status);
    }

    public function getStatusWarnaAttribute(): string
    {
        return self::STATUS[$this->status][1] ?? 'blue';
    }
}
