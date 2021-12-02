<?php

namespace App\Mail\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MasterApplication extends Mailable
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
        return $this->subject('Master Application - Study in Canada')->view('frontend.mail.master_application');
    }
}
