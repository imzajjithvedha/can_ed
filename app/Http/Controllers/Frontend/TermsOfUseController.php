<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;

/**
 * Class TermsOfUseController.
 */
class TermsOfUseController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $terms_of_use = Pages::where('name', 'terms_of_use')->first();

        return view('frontend.page.terms_of_use', ['terms_of_use' => $terms_of_use]);
    }
}
