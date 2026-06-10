<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'masuk' => 'datetime',
        'keluar' => 'datetime',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'id_lokasi');
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class, 'id_jenis');
    }
}
