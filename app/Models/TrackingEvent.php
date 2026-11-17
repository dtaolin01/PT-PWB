<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackingEvent extends Model
{
    protected $fillable = ['pengiriman_id', 'urutan', 'judul', 'waktu', 'lokasi', 'selesai'];

    protected $casts = [
        'waktu'   => 'datetime',
        'selesai' => 'boolean',
    ];

    public function pengiriman(): BelongsTo
    {
        return $this->belongsTo(Pengiriman::class);
    }
}
