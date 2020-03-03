<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Participant;

class StatisticController extends Controller
{
    public function event(Request $request){
    	$r = [];
    	for($i = 1; $i <= 12; $i++){
    		$r[] = Event::whereMonth('started_date', '=', str_pad($i, 2, '0', STR_PAD_LEFT))
    					->whereYear('started_date', '=', $request->year)
    					->count();
    	}
    	return response()->json(['data' => $r]);
    }

    public function participant(Request $request){
    	$r = [];
    	for($i = 1; $i <= 12; $i++){
    		$r[] = Participant::whereMonth('created_at', '=', str_pad($i, 2, '0', STR_PAD_LEFT))
    					->whereYear('created_at', '=', $request->year)
    					->count();
    	}
    	return response()->json(['data' => $r]);
    }
}
