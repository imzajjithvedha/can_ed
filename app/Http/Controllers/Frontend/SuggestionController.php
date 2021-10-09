<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Frontend\Suggestion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

/**
 * Class SuggestionController.
 */
class SuggestionController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.suggestions');
    }

    public function send(Request $request)
    {

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to(['zajjith@yopmail.com', 'zajjith@gmail.com', 'ccaned@gmail.com'])->send(new Suggestion($details));

        return redirect()->back()->with('success', 'success');
    }
}
