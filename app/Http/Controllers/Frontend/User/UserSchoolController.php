<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

/**
 * Class UserSchoolController.
 */
class UserSchoolController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolDashboard()
    {
        return view('frontend.user.school_dashboard');
    }

    

    public function suggestedPrograms()
    {
        return view('frontend.user.suggested_programs');
    }
}
