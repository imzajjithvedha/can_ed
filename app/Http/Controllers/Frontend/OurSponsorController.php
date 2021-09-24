<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\OurSponsors;

/**
 * Class OurSponsorController.
 */
class OurSponsorController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $our_sponsors = Pages::where('name', 'our_sponsors')->first();

        $sponsors = OurSponsors::where('status', 'Approved')->get();

        return view('frontend.our_sponsors', ['our_sponsors' => $our_sponsors, 'sponsors' => $sponsors]);
    }
}
