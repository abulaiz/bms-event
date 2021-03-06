<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Validator;
use Datatables;

class EventController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('paginated_list');
    }    

    public function index(){
        return Datatables::of(Event::orderByDesc('started_date')->get())
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                return View('_admin._contents.events._partitions.index_action')->render();
                            })
                            ->addColumn('_status', function($row){ 
                                return View('_admin._contents.events._partitions.index_status', compact('row'))->render();
                            })
                            ->addColumn('_participant_count', function($row) {
                                return count($row->participants);
                            })
                            ->addColumn('_type', function($row){ return $row->type == '1' ? 'Umum' : 'Private'; })
                            ->rawColumns(['_status', 'action'])
                            ->make(true);        
    }


    /**
     * Get List of event with pagination and searching
     * @request  - filter_mode : true / false, // used for searching
     *           - filter : 'searched event name' // if filter mode on
     *           - paginate_position : 1 ... MAX_PAGINATION
     * @response - data // list of event
     *           - paginate_count
     */
    public function paginated_list(Request $request){
        $max_per_paginate = 8;

        if($request->filter_mode == true || $request->filter_mode == 'true'){
            $filter = $request->filter;
            $data = Event::orderByDesc('started_date')->where('type', '1')->where('name', 'like', "%$filter%");
        } else {
            $data = Event::orderByDesc('started_date')->where('type', '1');
        }
        
        $count = $data->count();
        $paginate_count = ceil( $count / $max_per_paginate );

        $res = $data->skip( ($request->paginate_position-1)*$max_per_paginate )->take( $max_per_paginate )->get();

        return response()->json(['data' => $res, 'paginate_count' => $paginate_count]);
    }

    public function list(){
        $data = Event::orderBy('name')->get();
        return response()->json($data);
    }

    public function detail($id){
        $data = Event::find($id);
        if($data == null)
            return "undefined";
        return response()->json($data);
    }

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|string|max:255',
    		'started_date' => 'required|date',
    		'ended_date' => 'required|date',
    		'place' => 'required|string|max:255',
    		'description' => 'required',
    		'agency' => 'required|string|max:255',
            'type' => 'required'
    	]);

        $validator->setAttributeNames([
            'name' => 'Nama Acara', 'started_date' => 'Tanggal Mulai Kegiatan',
            'ended_date' => 'Tanggal Selesai Kegiatan', 'place' => 'Tempat Kegiatan',
            'description' => 'Deskripsi kegiatan', 'agency' => 'Instansi', 'type' => 'Jenis Acara'
        ]);

	    if( $validator->fails() )
	    	return response()->json(['errors' => $validator->errors()->all(), 'success' => false]);

	    $img = $request->file('image');
	    $event = Event::create([
	    	'name' => $request->name, 'started_date' => $request->started_date,
	    	'ended_date' => $request->ended_date, 'place' => $request->place,
	    	'description' => $request->description, 'agency' => $request->agency,
            'type' => $request->type
	    ]);

        if($request->type == '2'){
            $o_flag = strtolower($request->name);
            $o_flag = str_replace(' ', '-', $o_flag);
            $flag = $o_flag;
            $f_count = 1;
            while ( Event::where('flag', $flag)->exists() ) {
                $flag = $o_flag.'-'.$f_count;
                $f_count++;
            } 
            $event->update(['flag' => $flag]);           
        }

	    $event->update(['image' => $img]);

	    return response()->json(['success' => true]);

    }

    public function edit($id){
        die($id);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'started_date' => 'required|date',
            'ended_date' => 'required|date',
            'place' => 'required|string|max:255',
            'description' => 'required',
            'agency' => 'required|string|max:255',
            'type' => 'required'
        ]);

        if( $validator->fails() )
            return response()->json(['errors' => $validator->errors()->all(), 'success' => false]);

        $img = $request->file('image');
        $event = Event::find($id);
        if($event == null)
            return response()->json(['success' => false]);
                
        $event->update([
            'name' => $request->name, 'started_date' => $request->started_date,
            'ended_date' => $request->ended_date, 'place' => $request->place,
            'description' => $request->description, 'agency' => $request->agency,
            'type' => $request->type
        ]);

        if($request->type == '2' && ($event->flag == null || $event->flag == "") ){
            $o_flag = strtolower($request->name);
            $o_flag = str_replace(' ', '-', $o_flag);
            $flag = $o_flag;
            $f_count = 1;
            while ( Event::where('flag', $flag)->exists() ) {
                $flag = $o_flag.'-'.$f_count;
                $f_count++;
            } 
            $event->update(['flag' => $flag]);           
        }        

        $event->update(['image' => $img]);

        return response()->json(['success' => true]);
    }

    public function destroy($id){
        $data = Event::find($id);
        if($data == null)
            return response()->json(['success' => false]);

        $data->delete();
        return response()->json(['success' => true]);
    }

    public function active_event(){
        $now = date('Y-m-d');
        $data = Event::where('started_date', '<=', $now)
                       ->where('ended_date', '>=', $now)
                       ->get();
        return response()->json($data);
    }
}
