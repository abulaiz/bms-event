<?php 

namespace App\Libs;

use Illuminate\Http\Request;
use Mail;

class MyEmail
{
	public function send($data)
	{		
		$main = $data['data'];
        Mail::send($data['template'], $main,
        function ($message) use ($main){
            $message->to($main['to'])
            ->subject($main['subject']);
            if( isset( $data['attachment'] ) ){
                $message->attachData( $data['attachment'], $data['attachment_name'] );
            }
        });

        if(Mail::failures()){
        	return false;
        }
        return true;
	}

}