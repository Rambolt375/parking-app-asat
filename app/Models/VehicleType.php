<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = 'vehicle__types';

    protected $guarded = ['id'];

    /**
     * Get the transactions for this vehicle type.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_jenis');
    }
}
