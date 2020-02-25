<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

include 'web/filehandler.php';

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', function() {
    return view('_admin._contents.auth.login');
})->name('login');

Route::get('/admin/dashboard', function() {
    return view('_admin._contents.dashboard.index');
})->name('dashboard');

Route::get('/admin/events', function() {
    return view('_admin._contents.events.index');
})->name('events');