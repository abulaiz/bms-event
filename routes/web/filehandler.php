<?php 
Route::get('qrcode/{id}', 'FileController@qrcode')->name('qrcode.out');
Route::get('event/picture/{id}', 'FileController@event_image')->name('event.image');

Route::get('ntar', 'PdfController@sertifikat');

// Name Tag API`S
Route::get('nametags/download/{event_id_code}', 'FileController@nametag_download')->name('nametags.download');
Route::get('nametag/show/{id}', 'PdfController@show_nametag')->name('nametag.show');