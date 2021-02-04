<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Booking;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Booking::class, function (Faker $faker) {
    $arrival = Carbon::instance($faker->dateTimeBetween('-1 months', '+1 months'));
    $departure = (clone $arrival)->addDays(random_int(0, 14));
    return [
        'arrival' => $arrival,
        'departure' => $departure ];
});