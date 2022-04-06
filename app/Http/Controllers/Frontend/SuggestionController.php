<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Frontend\Suggestion;
use App\Mail\Frontend\UserSuggestion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Pages;

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
        $suggestions = Pages::where('name', 'suggestions')->first();

        return view('frontend.page.suggestions', ['suggestions' => $suggestions]);
    }

    public function send(Request $request)
    {

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to(['ccaned@gmail.com'])->send(new Suggestion($details));

        Mail::to([$request->email])->send(new UserSuggestion($details));

        return redirect()->back()->with('success', 'success');
    }
}
