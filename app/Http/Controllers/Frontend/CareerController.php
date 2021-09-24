<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class CareerController.
 */
class CareerController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function careers()
    {
        return view('frontend.careers');
    }

    public function jobs()
    {
        return view('frontend.jobs');
    }
}
