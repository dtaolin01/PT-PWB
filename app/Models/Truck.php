<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Truck extends Model
{
    public const JENIS = ['Tronton', 'Fuso'];

    protected $fillable = ['foto', 'plat', 'jenis', 'kapasitas_ton', 'supir_id', 'status'];

    // status => [label, warna badge]
    public const STATUS = [
        'tersedia'  => ['Tersedia',  'green'],
        'digunakan' => ['Digunakan', 'blue'],
        'perawatan' => ['Perawatan', 'amber'],
    ];

    public function supir(): BelongsTo
    {
        return $this->belongsTo(Supir::class);
    }

    public function pengiriman(): HasMany
    {
        return $this->hasMany(Pengiriman::class);
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
