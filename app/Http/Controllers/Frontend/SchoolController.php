<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schools;
use App\Mail\Frontend\School;
use Illuminate\Support\Facades\Mail;

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
        $school->user_email = $request->email;
        $school->user_phone = $request->phone;
        $school->message = $request->message;
        $school->status = 'Pending';
        $school->images = '[]';
        $school->links = '[]';

        $school->save();


        $details = [
            'name' => $request->name,
            'website' => $request->website,
            'reach_time' => $request->reach_time,
            'time_zone' => $request->time_zone,
            'country' => $request->country,
            'user_email' => $request->email,
            'user_phone' => $request->phone,
            'message' => $request->message
        ];

        Mail::to(['zajjith@yopmail.com', 'zajjith@gmail.com', 'ccaned@gmail.com'])->send(new School($details));


        return back()->with('success', 'success');

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
