<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Event;
use Datatables;

class ParticipantController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }    
    
    public function index($event_id){
        $event = Event::find($event_id);
        if($event == null)
            return response()->json([]);

        return Datatables::of(Participant::where('event_id', $event_id)->with('job')->with('personality')->get())
                            ->addIndexColumn()
                            ->addColumn('action', function($row) use ($event){
                                return View('_admin._contents.peserta._partitions.index_action', compact('row', 'event'));
                            })
                            ->addColumn('status', function($row) use ($event){
                                return View('_admin._contents.peserta._partitions.index_status', compact('row', 'event'));
                            })
                            ->rawColumns(['status', 'action'])
                            ->make(true);      	
    }

    public function delete(Request $request){
        $data = Participant::find($request->id);
        if($data == null)
            return response()->json(['success' => false]);

        $data->delete();
        return response()->json(['success' => true]);
    }
}
