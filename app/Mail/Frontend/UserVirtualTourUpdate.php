<?php

namespace App\Mail\Frontend;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserVirtualTourUpdate extends Mailable
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
        return $this->subject('Virtual tour update request - Proxima Study')->view('frontend.mail.user_update_virtual_tour');
    }
}
