<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Event;
use Datatables;

class ParticipantController extends Controller
{
    public function index($event_id){
        $event = Event::find($event_id);
        if($event == null)
            return response()->json([]);

        return Datatables::of(Participant::where('event_id', $event_id)->with('job')->with('personality')->get())
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                return View('_admin._contents.peserta._partitions.index_action');
                            })
                            ->addColumn('status', function($row){
                                $status = $row->status;
                                return View('_admin._contents.peserta._partitions.index_status', compact('row', 'status'));
                            })
                            ->rawColumns(['status', 'action'])
                            ->make(true);      	
    }
}
