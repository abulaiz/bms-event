<?php

Route::get('/detail', function() {
    return view('_user._contents.events.detail');
})->name('detail-event');