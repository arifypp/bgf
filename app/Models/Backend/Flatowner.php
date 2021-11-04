<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Flatowner extends Model
{
    use HasFactory;
    protected $table = 'flatowners';
    // Get floor name
    function floor()
    {
    	return $this->belongsTo(Floor::class, 'floorID');
    }
    // Get unit name
    function unit()
    {
    	return $this->belongsTo(Unit::class, 'unitID');
    }
    // Get flat owner
    function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
