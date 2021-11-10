<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';

    public function notificationseen()
    {
        return $this->hasMany(notificationseen::class, 'notificationID')->where('userid','=',Auth::user()->id)->where('seen','=',1);
    }
}
