<?php

use Illuminate\Database\Seeder;
use App\Hotel;
use App\Booking;
class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::all()->each(function(Hotel $hotel){
            $booking = factory(Booking::class) ->make();
            $bookings = collect([$booking]);

            for($i = 0; $i< random_int(1,20); $i++){
                $arrival = (clone $booking->departure)->addDays(random_int(1,14));
                $departure = (clone $arrival)->addDays(random_int(0,14));

                $booking = Booking::make([
                   'arrival' => $arrival,
                   'departure' => $departure
                ]);
                $bookings->push($booking);
            }
            $hotel->bookings()->saveMany($bookings);
        });
    }
}
