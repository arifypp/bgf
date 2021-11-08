<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificationseen extends Model
{
    use HasFactory;
    protected $table = 'notificationseens';

    public function Notification()
    {
        return $this->belongsTo(Notification::class, 'notificationID');
    }
}
