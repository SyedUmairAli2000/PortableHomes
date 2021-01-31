<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
$suffix =[
    'Villa',
    'House',
    'Apartment',
    'Dorms',
    'Rooms',
    'Portions',
];


$factory->define(Hotel::class, function (Faker $faker) use($suffix) {
    return [
        'title' => $faker->city . '' . Arr::random($suffix),
        'content' => $faker->text()

    ];
});
