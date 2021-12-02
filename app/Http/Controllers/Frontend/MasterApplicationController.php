<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Schools;
use App\Models\SchoolPrograms;
use App\Models\Master;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;
use App\Mail\Frontend\MasterApplication;
use App\Mail\Frontend\UserMasterApplication;
use App\Mail\Frontend\SchoolMasterApplication;

/**
 * Class MasterApplicationController.
 */
class MasterApplicationController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index($id, $slug)
    {
        $school = Schools::where('status', 'Approved')->where('id', $id)->first();

        $programs = SchoolPrograms::where('school_id', $id)->get();

        $degree_levels = $programs->unique('degree_level');

        return view('frontend.school.master_application', [
            'school' => $school,
            'programs' => $programs,
            'degree_levels' => $degree_levels
        ]);
    }

    public function store(Request $request)
    {
        $application = new Master;

        $tests = $request->tests;

        $marks = $request->marks;

        $arr = [];

        foreach($tests as $key=>$test) {

            $data = [
                'test' => $test,
                'mark' => $marks[$key]
            ];

            array_push($arr, $data); 
        }


        if($user = Auth::user()){

            $application->user_id = auth()->user()->id;
        }

        else {
            $application->user_id = null;
        }


        $application->first_name = $request->first_name;
        $application->last_name = $request->last_name;
        $application->dob = $request->dob;
        $application->gender = $request->gender;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->school_text = $request->school_text;
        $application->messaging_app = json_encode($request->messaging_app);
        $application->username = $request->username;
        $application->citizenship = $request->citizenship;
        $application->citizenship_live = $request->citizenship_live;
        $application->country = $request->country;
        $application->status = json_encode($request->status);
        $application->citizenship_country = $request->citizenship_country;
        $application->citizenship_postal = $request->citizenship_postal;
        $application->residence_country = $request->residence_country;
        $application->residence_postal = $request->residence_postal;
        $application->message = $request->message;
        $application->school_name = $request->school_name;
        $application->gpa = $request->gpa;
        $application->school_city = $request->school_city;
        $application->school_country = $request->school_country;
        $application->start_date = $request->start_date;
        $application->interested = $request->interested;
        $application->like_study = $request->like_study;
        $application->student_type_1 = $request->student_type_1;
        $application->student_type_2 = json_encode($request->student_type_2);
        $application->tests = json_encode($arr);
        $application->comments = $request->comments;
        $application->questions = $request->questions;
        $application->transfer_student = $request->transfer_student;
        $application->visa = $request->visa;

        $application->save();

        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone' => $request->phone,
            'school_text' => $request->school_text,
            'messaging_app' => json_encode($request->messaging_app),
            'username' => $request->username,
            'citizenship' => $request->citizenship,
            'citizenship_live' => $request->citizenship_live,
            'country' => $request->country,
            'status' => json_encode($request->status),
            'citizenship_country' => $request->citizenship_country,
            'citizenship_postal' => $request->citizenship_postal,
            'residence_country' => $request->residence_country,
            'residence_postal' => $request->residence_postal,
            'message' => $request->message,
            'school_name' => $request->school_name,
            'gpa' => $request->gpa,
            'school_city' => $request->school_city,
            'school_country' => $request->school_country,
            'start_date' => $request->start_date,
            'interested' => $request->interested,
            'like_study' => $request->like_study,
            'student_type_1' => $request->student_type_1,
            'student_type_2' => json_encode($request->student_type_2),
            'tests' => json_encode($arr),
            'comments' => $request->comments,
            'questions' => $request->questions,
            'transfer_student' => $request->transfer_student,
            'visa' => $request->visa,
            'school_id' => $request->school_id,
            'school_slug' => $request->school_slug,
        ];

        Mail::to(['zajjith@gmail.com'])->send(new MasterApplication($details));

        Mail::to([$request->email])->send(new UserMasterApplication($details));

        Mail::to([Schools::where('id', $request->school_id)->first()->school_email])->send(new SchoolMasterApplication($details));

        return redirect()->route('frontend.single_school', [$request->school_id, $request->school_slug])->with('success', 'success');
    }
}
