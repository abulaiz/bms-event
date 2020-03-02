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

// Event API`S
Route::get('event/active', 'EventController@active_event')->name('api.event.active');
Route::get('event/detail/{id}', 'EventController@detail')->name('api.event.detail');
Route::post('event/paginated', 'EventController@paginated_list')->name('api.event.paginated_list');
Route::get('event/list', 'EventController@list')->name('api.event.list');
Route::resource('event', 'EventController', ['as' => 'api'])->except(['create']);

// Participant API`S
Route::get('participant/{event_id}', 'ParticipantController@index')->name('api.participant.index');

// Attendances API`S
Route::post('attendances/scan', 'AttendanceController@setAttendance')->name('api.scan');
Route::get('attendances/{event_id}', 'AttendanceController@attendanceList')->name('api.scan.list');

// Generate PDF File API'S
Route::post('nametags/generate', 'PdfController@generate_nametags')->name('api.nametags.generate');
