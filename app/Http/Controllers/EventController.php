<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Validator;
use Datatables;

class EventController extends Controller
{
    public function index(){
        $now = strtotime( date('Y-m-d') );
        return Datatables::of(Event::orderByDesc('started_date')->get())
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                return View('_admin._contents.events._partitions.index_action')->render();
                            })
                            ->addColumn('status', function($row) use ($now){ // 1 : Comming Sonn. 2 : Berlangsung, 3 : Selesai
                                $status = ''; $id = $row->id;
                                if( $now > strtotime($row->ended_date) )
                                    $status = 3;
                                elseif($now < strtotime($row->started_date))
                                    $status = 1;
                                else
                                    $status = 2;
                                return View('_admin._contents.events._partitions.index_status', compact('status', 'id'))->render();
                            })
                            ->addColumn('_type', function($row){ return $row->type == '1' ? 'Umum' : 'Private'; })
                            ->rawColumns(['status', 'action'])
                            ->make(true);        
    }


    /**
     * Get List of event with pagination and searching
     * @request filter_mode : true / false, // used for searching
     * @request filter : 'searched event name' // if filter mode on
     * @request paginate_position : 1 ... MAX_PAGINATION
     */
    public function paginated_list(Request $request){
        $max_per_paginate = 5;

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
        return reponse()->json($data);
    }
}
