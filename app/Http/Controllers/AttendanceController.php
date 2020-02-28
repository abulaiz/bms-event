<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;

class AttendanceController extends Controller
{
    public function setAttendance(Request $request){
    	$participant = Participant::where('flag', $request->flag)->get();

    	if( $participant[0]->event_id != $request->event_id )
    		return response()->json(['success' => false, 'message' => 'ID tidak sesuai dengan acara yang dimaksud']);

    	if(  count($participant) != 1)
    		return response()->json(['success' => false, 'message' => 'Peserta tidak ditemukan !']);

    	$participant[0]->update(['attendance_at' => date('Y-m-d h:i:s')]);

    	return response()->json(['success' => true, 'name' => $participant[0]->full_name]);
    }

    public function attendanceList($event_id){
    	$data = Participant::orderByDesc('attendance_at')->where('event_id', $id)
    						->where('attendance_at', '!=', null)
    						->get();
    	return response()->json($data);
    }
}
