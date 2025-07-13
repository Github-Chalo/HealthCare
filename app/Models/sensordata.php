<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sensordata extends Model
{
    

    protected $fillable = [
        'adreno_no',
        'Spo2',
        'Heart_rate',
        'body_temperature',
    ];


    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'adreno_no');
    // }

    

    // Define any relationships or additional methods if needed
}
