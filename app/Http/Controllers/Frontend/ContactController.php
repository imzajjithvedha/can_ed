<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\SendContactRequest;
use App\Mail\Frontend\SendContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\WebsiteInformation; 

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    
    public function index()
    {
        $information = WebsiteInformation::where('id', 1)->first();

        return view('frontend.page.contact_us', ['information' => $information]);
    }

    
    public function send(Request $request)
    {

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to(['zajjith@gmail.com', 'ccaned@gmail.com'])->send(new SendContact($details));

        return redirect()->back()->with('success', 'success');
    }
}
