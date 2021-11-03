<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    function unit()
    {
    	return $this->belongsTo(Unit::class, 'floorno');
    }

}
