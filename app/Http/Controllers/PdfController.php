<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Event;
use App\Models\Participant;
use Storage;
use SimpleEnc;
use Zipper;

class PdfController extends Controller
{
    public function sertifikat(){
    	$pdf = PDF::loadView('_pdf.test_certificate');
    	$pdf->setPaper('a4', 'landscape');
    	return $pdf->stream('eunha.pdf');
    }

    public function nametag(){
    	$pdf = PDF::loadView('_pdf.test_nametag');
    	$pdf->setPaper('b5', 'landscape');
    	return $pdf->stream('yerin.pdf');
    }

   /**
    @params   : - event_id
                - participant_id
                - download (true/false)
                - get_participants (true/false)
    @response : - participants
                - download_link // if flag is 3
                - flag (1/2/3) // 1 : Fetch participants. 2 : on creating pdf, 3 : return link
    */
    public function generate_nametags(Request $request){
        if( $request->get_participants || $request->get_participants == 'true' ){
            $event = Event::find($request->event_id);
            if($event == null)
                return response()->json([]);

            // If in current folder has generated
            if( Storage::exists('event_nametags/'.$event->id) ){
                $files = Storage::files('event_nametags/'.$event->id);
                foreach ($files as $file) {
                    Storage::delete($file);
                }
            } else {
                Storage::makeDirectory('event_nametags/'.$event->id, 777, true, true);
            }

            return response()->json(['participants' => $event->participants()->pluck('id'), 'flag' => '1']);
        } else {
            $participant = Participant::find($request->participant_id);
            $event = Event::find($request->event_id);
            $pdf = PDF::loadView('_pdf.nametag', compact('participant', 'event'));
            $pdf->setPaper('b5', 'landscape');            
            $content = $pdf->download()->getOriginalContent();
            $filename = $participant->id."_".str_replace(' ', '_', $participant->full_name).'.pdf';
            Storage::put('event_nametags/'.$event->id.'/'.$filename,$content);

            if($request->download == 'true'){
                $zip_name = $event->id."_".$event->name."_Name_Tags.zip";
                $files = storage_path('app/event_nametags/'.$event->id);
                Zipper::make(storage_path('app/event_nametags/'.$event->id.'/'.$zip_name))->add($files)->close();      
                return response()->json(['flag' => '3', 'download_link' => route('nametags.download', (new SimpleEnc())->encrypt($event->id) )]);          
            }            
            return response()->json(['flag' => '2']);
        }
    }
}
