<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'name', 'site', 'color', 'image',
    ];

    public function phone()
    {
        return $this->hasMany('App\Models\Phone', 'company');
    }
}
