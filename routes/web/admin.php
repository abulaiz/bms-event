<?php 

Route::prefix('admin')->group(function () {
	// Dashboard routes
	Route::get('dashboard', function() {
	    return view('_admin._contents.dashboard.index');
	})->name('dashboard');

	// Event Routes
	Route::get('events', function() {
	    return view('_admin._contents.events.index');
	})->name('events');
	Route::resource('events', 'EventController')->only(['edit']);

	Route::get('laporan', function() {
	    return view('_admin._contents.laporan.index');
	})->name('laporan');

	Route::get('absensi', function() {
	    return view('_admin._contents.absensi.index');
	})->name('absensi');

	Route::get('peserta', function() {
	    return view('_admin._contents.peserta.index');
	})->name('peserta');
});