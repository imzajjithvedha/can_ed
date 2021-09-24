<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;

/**
 * Class DisclaimerController.
 */
class DisclaimerController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $disclaimer = Pages::where('name', 'disclaimer')->first();

        return view('frontend.disclaimer', ['disclaimer' => $disclaimer]);
    }
}
