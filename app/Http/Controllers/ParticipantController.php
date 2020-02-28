<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use Datatables;

class ParticipantController extends Controller
{
    public function index(){
        return Datatables::of(Participant::all())
                            ->addIndexColumn()
                            ->addColumn('action', function($row){
                                return '';
                            })
                            ->addColumn('status', function($row){ // 1 : Comming Sonn. 2 : Berlangsung, 3 : Selesai
                                $status = ''; $id = $row->id;
                                if( $now > strtotime($row->ended_date) )
                                    $status = 3;
                                elseif($now < strtotime($row->started_date))
                                    $status = 1;
                                else
                                    $status = 2;
                                return View('_admin._contents.event._partitions.status', compact('status', 'id'))->render();
                            })
                            ->addColumn('_type', function($row){ return $row->type == '1' ? 'Umum' : 'Private'; })
                            ->make(true);      	
    }
}
