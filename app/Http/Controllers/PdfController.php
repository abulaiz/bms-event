<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Event;
use App\Models\Participant;
use Storage;
use SimpleEnc;
use Zipper;
use Mail;
use App\Models\Setting;

class PdfController extends Controller
{
    private function get_day($arr){
        $s = $arr[2];
        if( (int)$s < 10 )
            $s = $s[1];
        return $s;
    }

    private function get_date($event){
        $started_dates = explode('-', $event->started_date);
        $ended_dates = explode('-', $event->ended_date);
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        $sd = [
            'D' => $this->get_day($started_dates), 'M' => $months[ (int)$started_dates[1] - 1], 'Y' => $started_dates[0]
        ];

        $ed = [
            'D' => $this->get_day($ended_dates), 'M' => $months[ (int)$ended_dates[1] - 1], 'Y' => $ended_dates[0]
        ];

        $sds = '';
        if( $sd['Y'] != $ed['Y'] ){
            $sds = $sd['D'].' '.$sd['M'].' '.$sd['Y'].' - ';
        } elseif( $sd['M'] != $ed['M'] ){
            $sds = $sd['D'].' '.$sd['M'].' - ';
        } elseif( $sd['D'] != $ed['D'] ){
            $sds = $sd['D'].' - ';
        }

        $eds = $ed['D'].' '.$ed['M'].' '.$ed['Y'];
        return $sds.$eds;
    }

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
    @params   : - id // participnat_id
    */
    public function show_nametag($id){
        $participant = Participant::find($id);
        if($participant == null)
            return 'Not Found';
        $event = Event::find( $participant->event_id );
        $pdf = PDF::loadView('_pdf.nametag', compact('participant', 'event'));
        $pdf->setPaper('b5', 'landscape');  
        return $pdf->stream( $participant->id."_".str_replace(' ', '_', $participant->full_name).'.pdf' );
    }


   /**
    @params   : - id // participnat_id
    */
    public function send_certificate($id){
        $participant = Participant::find($id);
        if($participant == null)
            return response()->json(['success' => false]);

        $event = Event::find( $participant->event_id );

        $setting = Setting::where('parameter', 'LAST_COUNT_GENERATED_CERTIFICATE')->get()[0];

        $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];

        $no_reg = "BMS-GBL/022-".((int)$setting->value+1)."/".$romawi[ (int)date('n')-1 ]."/".date('Y');
        $name = $participant->full_name;
        $event_name = $event->name;
        $date = $this->get_date($event);

        // If in current folder has generated
        if( Storage::exists('e_certificates/'.$participant->id) ){
            $files = Storage::files('e_certificates/'.$participant->id);
            foreach ($files as $file) {
                Storage::delete($file);
            }
        } else {
            Storage::makeDirectory('e_certificates/'.$participant->id, 777, true, true);
        }

        $pdf = PDF::loadView('_pdf.certificate', compact('no_reg', 'name', 'event_name', 'date'));
        $pdf->setPaper('A4', 'landscape');            
        $content = $pdf->download()->getOriginalContent();
        $filename = "E-Sertifikat_".str_replace(' ', '_', $participant->full_name).'.pdf';
        Storage::put('e_certificates/'.$participant->id.'/'.$filename,$content);

        $setting->update(['value' => (int)$setting->value+1]);

        Mail::to($participant->email)->send(new \App\Mail\SendCertificate($participant, $event));  

        response()->json(['success' => true]); 
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
