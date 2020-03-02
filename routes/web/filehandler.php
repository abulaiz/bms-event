<?php 
Route::get('qrcode/{id}', 'FileController@qrcode')->name('qrcode.out');
Route::get('event/picture/{id}', 'FileController@event_image')->name('event.image');

Route::get('pdf/certificate', 'PdfController@sertifikat');
Route::get('pdf/nametag', 'PdfController@nametag');

Route::get('nametags/download/{event_id_code}', 'FileController@nametag_download')->name('nametags.download');