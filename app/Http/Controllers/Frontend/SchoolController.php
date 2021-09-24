<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schools; 

/**
 * Class SchoolController.
 */
class SchoolController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public function schoolRegister()
    {
        return view('frontend.school_register');
    }

    public function schoolRegisterRequest(Request $request)
    {

        $user_id = auth()->user()->id;

        $school = new Schools;

        $school->user_id = $user_id;
        $school->name = $request->name;
        $school->website = $request->website;
        $school->reach_time = $request->reach_time;
        $school->time_zone = $request->time_zone;
        $school->country = $request->country;
        $school->description = $request->description;
        $school->status = 'Pending';

        $school->save();

        return redirect('/');

    }

    public function index()
    {
        return view('frontend.schools');
    }

    public function singleSchool()
    {
        return view('frontend.single_school');
    }
}
