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

        if (Schools::where('user_id', $user_id)->first()) {

            return back()->with('warning', 'warning');

        } 

        else {

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

            return redirect()->route('frontend.index')->with('success', 'success');
        }

        

    }

    public function index()
    {
        $schools = Schools::where('status', 'Approved')->get();

        return view('frontend.schools', ['schools' => $schools]);
    }

    public function singleSchool()
    {
        return view('frontend.single_school');
    }


    public function schoolSearch(Request $request)
    {
        if(request('keyword') != null) {
            $school = request('keyword');
        }
        else {
            $school = 'school';
        }

        return redirect()->route('frontend.school_search_function', [$school]);

    }

    public function schoolSearchFunction($school)
    {
        $schools = Schools::where('status', 'Approved');

        if($school != 'school'){
            $schools->where('name', 'like', '%' .  $school . '%');
        }

        $filteredSchools = $schools->get();

        return view('frontend.schools_search', ['filteredSchools' => $filteredSchools]);

    }
}
