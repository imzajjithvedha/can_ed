<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quotes;
use App\Mail\Frontend\Quote;
use Illuminate\Support\Facades\Mail;

/**
 * Class QuoteController.
 */
class QuoteController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $quotes = Quotes::where('status', 'Approved')->orderBy('updated_at', 'DESC')->get();

        return view('frontend.quotes', ['quotes' => $quotes]);
    }

    public function quoteRequest(Request $request)
    {
        $user_id = auth()->user()->id;

        $quotes = new Quotes;

        $quotes->user_id = $user_id;
        $quotes->quote = $request->quote;
        $quotes->status = 'Pending';

        $quotes->save();

        $details = [
            'quote' => $request->quote,
        ];

        Mail::to(['zajjith@yopmail.com', 'zajjith@gmail.com', 'ccaned@gmail.com'])->send(new Quote($details));

        return back()->with('success', 'success'); 

    }
}
