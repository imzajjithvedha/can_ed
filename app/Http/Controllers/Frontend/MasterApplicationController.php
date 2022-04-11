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
use App\Models\DegreeLevels;
use App\Models\Programs;
use App\Mail\Frontend\MasterApplicationNormal;
use App\Mail\Frontend\UserMasterApplicationNormal;

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

        $degree = $programs->unique('degree_level');


        //Degree levels
        $degree_levels = DegreeLevels::get();

        $a = [];

        foreach ($degree as $deg){ 
            foreach($degree_levels as $degree_level) {
                if($deg->degree_level == $degree_level->id) {
                    array_push($a, $degree_level);
                }
            }
        }

        $a = collect($a);

        $data = $a->sortBy('name');


        // School programs

        $all_programs = Programs::get();

        $b = [];

        foreach ($programs as $program){ 
            foreach($all_programs as $all_program) {
                if($program->program_id == $all_program->id) {
                    array_push($b, $all_program);
                }
            }
        }

        $b = collect($b);

        $prog = $b->sortBy('name');


        return view('frontend.school.master_application', [
            'school' => $school,
            'prog' => $prog,
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $application = new Master;

        $tests = $request->tests;

        $marks = $request->marks;

        $arr = [];

        if($tests != null) {
            foreach($tests as $key=>$test) {

                $data = [
                    'test' => $test,
                    'mark' => $marks[$key]
                ];
    
                array_push($arr, $data); 
            }
        }


        if($user = Auth::user()){

            $application->user_id = auth()->user()->id;
        }

        else {
            $application->user_id = null;
        }

        $application->school_id = $request->school_id;
        $application->first_name = $request->first_name;
        $application->last_name = $request->last_name;
        $application->dob = $request->dob;
        $application->gender = $request->gender;
        $application->email = $request->email;
        $application->phone = $request->phone;
        $application->school_text = $request->school_text;
        $application->messaging_app = json_encode($request->messaging_app);
        $application->username = $request->username;
        $application->study_location = json_encode($request->study_location);
        $application->citizenship = $request->citizenship;
        $application->citizenship_live = $request->citizenship_live;
        $application->residence_country = $request->country;
        $application->residence_status = json_encode($request->status);
        $application->mailing_address = $request->mailing_address;
        $application->school_name = $request->school_name;
        $application->gpa = $request->gpa;
        $application->school_city = $request->school_city;
        $application->school_country = $request->school_country;
        $application->start_date = $request->start_date;
        $application->interested = $request->interested;
        $application->like_study = $request->like_study;
        $application->student_type = $request->student_type;
        $application->funding_source = json_encode($request->funding_source);
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
            'study_location' => json_encode($request->study_location),
            'citizenship' => $request->citizenship,
            'citizenship_live' => $request->citizenship_live,
            'residence_country' => $request->country,
            'residence_status' => json_encode($request->status),
            'mailing_address' => $request->mailing_address,
            'school_name' => $request->school_name,
            'gpa' => $request->gpa,
            'school_city' => $request->school_city,
            'school_country' => $request->school_country,
            'start_date' => $request->start_date,
            'interested' => $request->interested,
            'like_study' => $request->like_study,
            'student_type' => $request->student_type,
            'funding_source' => json_encode($request->funding_source),
            'tests' => json_encode($arr),
            'comments' => $request->comments,
            'questions' => $request->questions,
            'transfer_student' => $request->transfer_student,
            'visa' => $request->visa,
            'school_id' => $request->school_id,
            'school_slug' => $request->school_slug,
            'email_copy' => $request->email_copy,
        ];

        Mail::to(['zajjith@yopmail.com'])->send(new MasterApplication($details));

        Mail::to([$request->email])->send(new UserMasterApplication($details));

        Mail::to([Schools::where('id', $request->school_id)->first()->school_email])->send(new SchoolMasterApplication($details));

        return redirect()->route('frontend.single_school', [$request->school_id, $request->school_slug])->with('success', 'success');
    }


    //Master application normal
    public function masterApplicationNormal()
    {
        $programs = Programs::where('status', 'Approved')->get();

        $degrees = DegreeLevels::where('status', 'Approved')->get();

        return view('frontend.school.master_application_normal', [
            'programs' => $programs,
            'degrees' => $degrees,
        ]);
    }

    public function masterApplicationNormalStore(Request $request)
    {

        $application = new Master;

        $tests = $request->tests;

        $marks = $request->marks;

        $arr = [];

        if($tests != null) {
            foreach($tests as $key=>$test) {

                $data = [
                    'test' => $test,
                    'mark' => $marks[$key]
                ];
    
                array_push($arr, $data); 
            }
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
        $application->study_location = json_encode($request->study_location);
        $application->citizenship = $request->citizenship;
        $application->citizenship_live = $request->citizenship_live;
        $application->residence_country = $request->country;
        $application->residence_status = json_encode($request->status);
        $application->mailing_address = $request->mailing_address;
        $application->school_name = $request->school_name;
        $application->gpa = $request->gpa;
        $application->school_city = $request->school_city;
        $application->school_country = $request->school_country;
        $application->start_date = $request->start_date;
        $application->interested = $request->interested;
        $application->like_study = $request->like_study;
        $application->student_type = $request->student_type;
        $application->funding_source = json_encode($request->funding_source);
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
            'study_location' => json_encode($request->study_location),
            'citizenship' => $request->citizenship,
            'citizenship_live' => $request->citizenship_live,
            'residence_country' => $request->country,
            'residence_status' => json_encode($request->status),
            'mailing_address' => $request->mailing_address,
            'school_name' => $request->school_name,
            'gpa' => $request->gpa,
            'school_city' => $request->school_city,
            'school_country' => $request->school_country,
            'start_date' => $request->start_date,
            'interested' => $request->interested,
            'like_study' => $request->like_study,
            'student_type' => $request->student_type,
            'funding_source' => json_encode($request->funding_source),
            'tests' => json_encode($arr),
            'comments' => $request->comments,
            'questions' => $request->questions,
            'transfer_student' => $request->transfer_student,
            'visa' => $request->visa,
            'email_copy' => $request->email_copy,
        ];

        Mail::to(['ccaned@gmail.com'])->send(new MasterApplicationNormal($details));

        Mail::to([$request->email])->send(new UserMasterApplicationNormal($details));

        return redirect()->route('frontend.master_application_normal')->with('success', 'success');
    }

}
