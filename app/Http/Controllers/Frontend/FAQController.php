<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;

/**
 * Class FAQController.
 */
class FAQController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $faq = Pages::where('name', 'faq')->first();

        return view('frontend.faq', ['faq' => $faq]);
    }
}
