<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        // $about = Pages::where('name', 'about_us')->first();

        return view('frontend.suggestions');
    }
}
