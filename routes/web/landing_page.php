<?php

Route::get('/', function () { return view('_user._contents.events.index');});
Route::get('event/detail/{id}', 'HomeController@event_detail')->name('event.detail');
Route::get('event/register/{id}', 'HomeController@event_register')->name('event.register');
Route::post('event/register', 'EventRegisterController@register')->name('event.register.store');