<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';

    protected $fillable = ['nama', 'kontak', 'email', 'alamat'];

    public function pengiriman(): HasMany
    {
        return $this->hasMany(Pengiriman::class);
    }
}
