<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supir extends Model
{
    protected $table = 'supir';

    protected $fillable = ['nama', 'telepon'];

    public function trucks(): HasMany
    {
        return $this->hasMany(Truck::class);
    }
}
