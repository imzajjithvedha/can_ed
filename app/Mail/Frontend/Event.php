<?php

namespace App\Mail\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Event extends Mailable
{
    use Queueable, SerializesModels;


    public $details;

    /**
     * Create a new message instance.
     * 
     * 
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Event Request - Studying in Canada')->view('frontend.mail.event_request');
    }
}