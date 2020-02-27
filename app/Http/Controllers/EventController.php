<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Validator;

class EventController extends Controller
{

    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|string|max:255',
    		'started_date' => 'required|date',
    		'ended_date' => 'required|date',
    		'place' => 'required|string|max:255',
    		'description' => 'required',
    		'agency' => 'required|string|max:255'
    	]);

	    if( $validator->fails() )
	    	return response()->json(['errors' => $validator->errors()->all(), 'success' => false]);

	    $img = $request->file('image');
	    $event = Event::create([
	    	'name' => $request->name, 'started_date' => $request->started_date,
	    	'ended_date' => $request->ended_date, 'place' => $request->place,
	    	'description' => $request->description, 'agency' => $request->agency
	    ]);

	    $event->update(['image' => $img]);

	    return response()->json(['success' => true]);

    }

    public function update(Request $request, $id){

    }
}
