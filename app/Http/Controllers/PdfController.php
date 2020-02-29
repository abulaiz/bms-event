<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function sertifikat(){
    	$pdf = PDF::loadView('_pdf.test_certificate');
    	$pdf->setPaper('a4', 'landscape');
    	return $pdf->stream('eunha.pdf');
    }

    public function nametag(){

    }
}
