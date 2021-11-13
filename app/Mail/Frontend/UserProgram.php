<?php

namespace App\Mail\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserProgram extends Mailable
{
    use Queueable, SerializesModels;


    // public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($details)
    // {
    //     $this->details = $details;
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Program suggestion - Study in Canada')->view('frontend.mail.user_program');
    }
}
