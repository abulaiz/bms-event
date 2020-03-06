<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use SimpleEnc;
use Response;
use App\Models\Event;

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
        $flag = (new SimpleEnc())->decrypt($code);
        $file = Storage::get('qrcode/'.$flag.'.png');

        return response($file)->header('Content-Type', 'image/png');
    }

    public function nametag_download($event_id_code){
        $event = Event::find( (new SimpleEnc())->decrypt($event_id_code) );
        if($event == null)
            return 'Not Found';

        $filename = $event->id."_".$event->name."_Name_Tags.zip";
        $file = 'event_nametags/'.$event->id."/".$filename;
        if(Storage::exists($file)){
            return Response::download(storage_path('app/'.$file) , $filename, ["Content-Type: application/octet-stream"]);    
        } else {
            return 'Not Found';
        }
    }
}
