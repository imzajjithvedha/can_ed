<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;

/**
 * Class CookiesController.
 */
class CookiesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cookies = Pages::where('name', 'cookies')->first();

        return view('frontend.page.cookies', ['cookies' => $cookies]);
    }
}
