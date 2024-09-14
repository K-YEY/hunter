<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ZoomMeetingLink extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $zoomLink;

    public function __construct($contact, $zoomLink)
    {
        $this->contact = $contact;
        $this->zoomLink = $zoomLink;
    }

    public function build()
    {
        return $this->view('emails.zoom_meeting_link')
                    ->with([
                        'contact' => $this->contact,
                        'zoomLink' => $this->zoomLink,
                    ]);
    }
}
