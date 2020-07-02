<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coordinates extends Model
{
    protected $fillable = [
        'user_id', 'lat', 'lng',     
    ];
}
