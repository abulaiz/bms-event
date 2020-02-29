<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use SimpleEnc;
use App\Models\Participant;
use App\Models\ParticipantJob;
use App\Models\ParticipantPersonality;
use App\Libs\MyEmail;
use Validator;

class EventRegisterController extends Controller
{

    private $myemail;

    public function __construct(){
        $this->myemail = new MyEmail();
    }    

    public function register(Request $request){
    	$validator = Validator::make($request->all(), [
    		'event_id' => 'required',
    		'full_name' => 'required|string|max:255',
    		'nick_name' => 'required|string|max:255',
    		'place_of_birth' => 'required|string|max:255',
    		'date_of_birth' => 'required|date',
    		'phone' => 'required',
    		'email' => 'required|email|max:255',
    		'instagram' => 'required|max:255',
    		'twitter' => 'required|max:255',
    		'facebook' => 'required|max:255',
    		'agency' => 'required|max:255',
    		'position' => 'required|max:255',
    		'years_of_service' => 'required|max:255',
    		'strength' => 'required|max:255',
    		'weakness' => 'required|max:255',
    		'opportunity' => 'required|max:255',
    		'challenge' => 'required|max:255',
    		'short_story' => 'required',
    		'hope_in_life' => 'required',
    		'hope_in_training' => 'required'
    	]);

	    if( $validator->fails() )
	    	return response()->json(['errors' => $validator->errors()->all(), 'success' => false]);

	    $event = Event::find($request->event_id);
	    if($event == null){
	    	$event = Event::find( (new SimpleEnc())->decrypt($request->event_id) );
	    	if($event == null){
	    		return response()->json(['success' => false]);
	    	}
	    }

	    $data = Participant::create([
    		'event_id' => $event->id,
    		'full_name' => $request->full_name,
    		'nick_name' => $request->nick_name,
    		'place_of_birth' => $request->place_of_birth,
    		'date_of_birth' => $request->date_of_birth,
    		'phone' => $request->phone,
    		'email' => $request->email,
    		'instagram' => $request->instagram,
    		'twitter' => $request->twitter,
    		'facebook' => $request->facebook
	    ]);

        $flag = strtoupper(uniqid());
        $qrcode_path = route('qrcode.out', (new SimpleEnc())->encrypt($flag) );

        while (Event::where('flag', $flag)->exists()) {
            $flag = strtoupper(uniqid());
        }

        $data->update(['flag' => $flag]);

	    $data->job()->create([
    		'agency' => $request->agency,
    		'position' => $request->position,
    		'years_of_service' => $request->years_of_service
	    ]);

	    $data->personality()->create([
    		'strength' => $request->strength,
    		'weakness' => $request->weakness,
    		'opportunity' => $request->opportunity,
    		'challenge' => $request->challenge,
    		'short_story' => $request->short_story,
    		'hope_in_life' => $request->hope_in_life,
    		'hope_in_training' => $request->hope_in_training	    	
	    ]);

        $mail_data = [
            'name'=> $request->full_name,
            'email'=> $request->email,
            'qrcode_path' => $qrcode_path,
            'to'=> $request->email,
            'subject'=> 'Berhasil Registrasi',
            'flag' => $flag        
        ];

        $email_data = [
            'data' => $mail_data,
            'template' => '_emails.registration_success'
        ];
        // $sent = $this->myemail->send($email_data);

	    return response()->json(['success' => true]);
    }
}
