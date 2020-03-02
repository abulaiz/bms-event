<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function event_register($id){
        $event = Event::find($id);
        if($event == null){
            $e = Event::where('flag', $id)->get();
            if(count($e) == 0)
                return "Not Found";
            $event = $e[0];
        }
        $id = $event->id;
        return view('_user._contents.register.index', compact('event'));
    }

    public function event_detail($id){
        $event = Event::find($id);
        if($event == null)
            return 'Not Found';
        return view('_user._contents.events.detail', compact('event'));
    }
}
