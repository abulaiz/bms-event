<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\ParticipantAttendance;
use App\Models\Event;

class AttendanceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    

    public function setAttendance(Request $request){
    	$participant = Participant::where('flag', $request->flag)->get();
        $event = Event::find($request->event_id);

        if($event == null)
            return response()->json(['success' => false, 'message' => 'Event tidak ditemukan']);

    	if( $participant[0]->event_id != $request->event_id )
    		return response()->json(['success' => false, 'message' => 'ID tidak sesuai dengan acara yang dimaksud']);

    	if(  count($participant) != 1)
    		return response()->json(['success' => false, 'message' => 'Peserta tidak ditemukan !']);

        $stat = '2';
        if( strtotime(date('Y-m-d H:i:s')) < strtotime( date('Y-m-d')." 11:00:00" ) )
            $stat = '1';

        if( !$participant[0]->attendances()->where('status', $stat)->exists() )
            $participant[0]->attendances()->create([
                'status' => $stat, 'event_id' => $request->event_id
            ]);

        $now_date = date('Y-m-d');
        if($event->last_attendance !=  $now_date){
            $event->attendance_count++;
            $event->last_attendance = $now_date;
            $event->save(); 
        }

    	return response()->json(['success' => true, 'name' => $participant[0]->full_name]);
    }

    public function attendanceList($event_id){
        $stat = '2';
        if( strtotime(date('Y-m-d H:i:s')) < strtotime( date('Y-m-d')." 11:00:00" ) )
            $stat = '1';

        $data = ParticipantAttendance::orderByDesc('created_at')
                                      ->where('event_id', $event_id)
                                      ->where('status', $stat)
                                      ->whereDate('created_at', '=', date('Y-m-d'))
                                      ->with('participant')
                                      ->get();

    	return response()->json($data);
    }
}
