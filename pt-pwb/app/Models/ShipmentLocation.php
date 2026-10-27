<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentLocation extends Model
{
    protected $guarded = [];

    protected $casts = [
        'recorded_at' => 'datetime',
    ];
}
