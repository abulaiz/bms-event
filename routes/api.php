<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('event/active', 'EventController@active_event')->name('api.event.active');
Route::get('event/detail/{id}', 'EventController@detail')->name('api.event.detail');
Route::post('event/paginated', 'EventController@paginated_list')->name('api.event.list');
Route::resource('event', 'EventController', ['as' => 'api'])->except(['create']);