<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function bookings(){

        return $this->hasMany(Booking::class);
    }

    
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function availableForArrival($arrival, $departure):bool
    {
        return 0 === $this->bookings()->betweenDates($arrival,$departure)->count();
    }
}
