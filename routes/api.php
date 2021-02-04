<?php
use App\Hotel;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('hotels',function(Request $request){
//         return Hotel::all();
// } );
// Route::get('hotels/{id}',function(Request $request ,$HotelId){
//     return Hotel::findOrFail($HotelId);
// });

// Route::get('hotels', 'Api\HotelController@Index');
// Route::get('hotels', 'Api\HotelController@Show');

Route::apiResource('hotels', 'Api\HotelController')->only(['index','show']);
Route::get('hotels/{hotel}/availability','Api\HotelAvailabilityController')->name('hotels.availability.show');
Route::get('hotels/{hotel}/reviews','Api\HotelReviewController')->name('hotels.reviews.index');