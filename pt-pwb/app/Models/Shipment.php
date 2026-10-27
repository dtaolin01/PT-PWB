<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipment extends Model
{
    protected $guarded = [];

    protected $casts = [
        'eta_date' => 'date',
    ];

    public function steps(): HasMany
    {
        return $this->hasMany(ShipmentStep::class)->orderBy('sort_order')->orderBy('id');
    }

    public function details(): HasMany
    {
        return $this->hasMany(ShipmentDetail::class)->orderBy('sort_order')->orderBy('id');
    }

    public function locations(): HasMany
    {
        return $this->hasMany(ShipmentLocation::class)->orderBy('sort_order')->orderBy('id');
    }
}
