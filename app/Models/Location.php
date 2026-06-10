<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the transactions for this location.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_lokasi');
    }
}
