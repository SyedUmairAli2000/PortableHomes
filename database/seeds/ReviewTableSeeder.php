<?php

use Illuminate\Database\Seeder;
use App\Hotel;
use App\Review;
class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hotel::all()->each(function (Hotel $hotel){
          $reviews = factory(Review::class, random_int(5,30))->make();

          $hotel->review()->saveMany($reviews);
        });
    }
}
