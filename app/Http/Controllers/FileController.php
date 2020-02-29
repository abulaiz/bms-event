<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use SimpleEnc;

class FileController extends Controller
{
    public function event_image($id){
    	ob_end_clean();
		$mime_type = [
			'jpg' => 'image/jpeg',
			'jpeg' => 'image/jpeg',
			'png' => 'image/png',
			'bmp' => 'image/bmp',
			'gif' => 'image/gif'
		];

    	$files = Storage::files('event_image/'.$id);
    	$f = explode('.', $files[0]);
    	$ext = $f[ count($f)-1 ];

    	if(isset($mime_type[$ext]))
        	$mime = $mime_type[$ext];
        else
        	$mime = 'image/png';

        return response(Storage::get($files[0]))->header('Content-Type', $mime);    	
    }

    public function qrcode($code){
        $flag = (new SimpleEnc())->decrypt($colde);
        $file = Storage::get('qrcode/'.$flag.'.png');

        return response($file)->header('Content-Type', 'image/png');
    }
}
