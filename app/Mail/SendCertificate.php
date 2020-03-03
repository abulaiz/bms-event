<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCertificate extends Mailable
{
    use Queueable, SerializesModels;
    private $participant, $event;
    /**
     * Create a new message instance.
     * 
     * @return void
     */
    public function __construct($participant, $event)
    {
        $this->participant = $participant;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->participant->full_name;
        $event_name = $this->event->name;
        $event_agency = $this->event->agency;
        $filepath = storage_path('app/e_certificates/'.$this->participant->id.'/'."E-Sertifikat_".str_replace(' ', '_', $this->participant->full_name).'.pdf');

        return $this->view('_emails.certificate', compact('name', 'event_name', 'event_agency'))
                    ->subject('E-Certificate')
                    ->attach( $filepath ,
                    [
                        'as' => "E-Sertifikat_".str_replace(' ', '_', $this->participant->full_name).'.pdf',
                        'mime' => 'application/pdf',
                    ]);    
    }
}
