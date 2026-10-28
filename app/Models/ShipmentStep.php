<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentStep extends Model
{
    protected $guarded = [];

    protected $casts = [
        'step_date' => 'date',
        'done'      => 'boolean',
    ];
}
