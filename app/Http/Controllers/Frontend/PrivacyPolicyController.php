<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;

/**
 * Class PrivacyPolicyController.
 */
class PrivacyPolicyController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $privacy = Pages::where('name', 'privacy_policy')->first();

        return view('frontend.privacy_policy', ['privacy' => $privacy]);
    }
}
