<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quotes;

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

        return back()->withFlashSuccess(__('alerts.frontend.quote.sent'));

    }
}
