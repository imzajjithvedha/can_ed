<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\SendContactRequest;
use App\Mail\Frontend\Contact\SendContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    
    public function index()
    {
        return view('frontend.contact_us');
    }

    
    public function send(Request $request)
    {

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('zajjith@yopmail.com')->send(new SendContact($details));

        return redirect()->back()->withFlashSuccess(__('alerts.frontend.contact.sent'));
    }
}
