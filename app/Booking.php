<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Hotel;
use App\Review;
class Booking extends Model
{
     protected $fillable = ['arrival', 'departure'];

    public function hotel(){
        
        return $this->belongsTo(Hotel::class);
    }

    
    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function scopeBetweenDates(Builder $query, $arrival, $departure){
            
       return $query->where('departure','>=',$arrival)
       ->where('arrival','=<',$departure);
    }
}
