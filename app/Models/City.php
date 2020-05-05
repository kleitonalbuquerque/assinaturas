<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = [
        'name', 'state',
    ];

    public function state()
    {
        return $this->hasOne('App\Models\State', 'state');
    }
}
