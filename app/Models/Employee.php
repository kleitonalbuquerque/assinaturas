<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'name', 'mail', 'office', 'company', 'city', 'phone', 'image',
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company');
    }
    public function phone()
    {
        return $this->belongsTo('App\Models\Phone', 'phone');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city');
    }
}
