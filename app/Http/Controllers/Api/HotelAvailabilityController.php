<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\Booking;

class HotelAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id,Request $request)
    {
        $data = $request->validate([
           'arrival' => 'required|date_format:Y-m-d|after_or_equal:now',
           'departure' => 'required|date_format:Y-m-d|after_or_equal:arrival'
        ]);

        $hotel = Hotel::findOrFail($id);
        return $hotel->availableForArrival($data['arrival'],$data['departure'])
                ? response()->json([]) 
                : response()->json([],404); 
    }
}
