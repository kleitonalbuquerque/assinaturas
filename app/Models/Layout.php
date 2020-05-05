<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    //
    protected $fillable = [
        'color', 'background', 'image', 'company',
    ];
}
