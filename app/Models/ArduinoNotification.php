<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArduinoNotification extends Model
{
    //
    protected $fillable = ['user_id', 'notified_at'];

    protected $casts = [
    'notified_at' => 'datetime',
];

}
