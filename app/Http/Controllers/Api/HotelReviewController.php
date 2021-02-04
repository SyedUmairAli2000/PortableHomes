<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\Http\Resources\HotelReviewIndexResource;
class HotelReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id,Request $request)
    {
        $hotel = Hotel::findOrFail($id);

        return HotelReviewIndexResource::collection($hotel->review()->latest()->get());
    }
}
