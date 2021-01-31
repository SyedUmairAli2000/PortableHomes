<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function bookings(){

        return $this->hasMany(Hotel::class);
    }
}
