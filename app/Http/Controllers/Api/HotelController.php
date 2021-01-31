<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hotel;
use App\Http\Resources\HotelShowResource;
use App\Http\Resources\HotelIndexResource;

class HotelController extends Controller
{
    public function Index(){

        return HotelIndexResource::collection(
            Hotel::all()
        );
    }

    public function Show($id)
    {
        return new HotelShowResource(Hotel::findOrFail($id));
    }
}
