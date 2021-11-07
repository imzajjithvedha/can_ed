<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schools;
use App\Mail\Frontend\School;
use Illuminate\Support\Facades\Mail;
use App\Models\FavoriteSchools;
use App\Models\Articles;
use App\Models\SchoolContacts;
use App\Models\SchoolPrograms;
use App\Models\SchoolScholarships;
use App\Models\SchoolScholarshipsFAQ;
use App\Models\SchoolOverviewFAQ;
use App\Models\SchoolAdmissionEmployees;
use App\Models\SchoolAdmissionFAQ;
use App\Models\SchoolFinancialFAQ;

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
        return view('frontend.school.school_register');
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

        return view('frontend.school.schools', ['schools' => $schools]);
    }

    public function singleSchool($id)
    {
        $school = Schools::where('id', $id)->first();

        $images = json_decode($school->images);

        $articles = Articles::where('status', 'Approved')->inRandomOrder()->limit(3)->get();

        $contacts = SchoolContacts::where('school_id', $id)->get();

        $high_school_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 1)->get();
        $language_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 2)->get();
        $certificate_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 3)->get();
        $summer_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 4)->get();
        $community_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 5)->get();
        $bachelor_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 6)->get();
        $master_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 7)->get();


        $scholarships = SchoolScholarships::where('school_id', $id)->get();

        $scholarship_faqs = SchoolScholarshipsFAQ::where('school_id', $id)->get();
        $overview_faqs = SchoolOverviewFAQ::where('school_id', $id)->get();

        $admission_employees = SchoolAdmissionEmployees::where('school_id', $id)->get();

        $admission_featured_employees = SchoolAdmissionEmployees::where('school_id', $id)->where('featured', 'Yes')->orderBy('updated_at', 'desc')->take(3)->get();

        $admission_faqs = SchoolAdmissionFAQ::where('school_id', $id)->get();

        $financial_faqs = SchoolFinancialFAQ::where('school_id', $id)->get();
        

        return view('frontend.school.single_school', [
            'school' => $school,
            'images' => $images,
            'articles' => $articles,
            'contacts' => $contacts,
            'high_school_programs' => $high_school_programs,
            'language_programs' => $language_programs,
            'certificate_programs' => $certificate_programs,
            'summer_programs' => $summer_programs,
            'community_programs' => $community_programs,
            'bachelor_programs' => $bachelor_programs,
            'master_programs' => $master_programs,
            'scholarships' => $scholarships,
            'scholarship_faqs' => $scholarship_faqs,
            'overview_faqs' => $overview_faqs,
            'admission_employees' => $admission_employees,
            'admission_featured_employees' => $admission_featured_employees,
            'admission_faqs' => $admission_faqs,
            'financial_faqs' => $financial_faqs,
        ]);
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

        return view('frontend.school.schools_search', ['filteredSchools' => $filteredSchools]);

    }


    public function favoriteSchool(Request $request) {

        $school_id = $request->hidden_id;
        $status = $request->favorite;
        $user_id = auth()->user()->id;


        if($status == 'non-favorite') {

            $favorite = new FavoriteSchools;

            $favorite->user_id = $user_id; 

            $favorite->school_id = $school_id;

            $favorite -> save();

            return back();
        }

        if($status == 'favorite') {

            $favorite = FavoriteSchools::where('user_id', $user_id)->where('school_id', $school_id)->delete();

            return back();
        }
    }



    public function schoolScholarshipSearch(Request $request)
    {
        if(request('keyword') != null) {
            $keyword = request('keyword');
        }
        else {
            $keyword = 'keyword';
        }

        if(request('award') == 'awards') {
            $award = 'awards';
        }
        else {
            $award = request('award');
        }

        if(request('level_of_study') == 'study-levels') {
            $level_of_study = 'study-levels';
        }
        else {
            $level_of_study = request('level_of_study');
        }

        if(request('availability') == 'availability') {
            $availability = 'availability';
        }
        else {
            $availability = request('availability');
        }

        $school_id = $request->school_id;

        return redirect()->route('frontend.school_scholarship_search_function', [ $school_id, $keyword, $award, $level_of_study, $availability]);

    }

    public function schoolScholarshipSearchFunction($school_id, $keyword, $award, $level_of_study, $availability)
    {

        $scholarships = SchoolScholarships::where('school_id', $school_id);

        $school = Schools::where('id', $school_id)->first();

        if($keyword != 'keyword'){
            $scholarships->where('name', 'like', '%' .  $keyword . '%');
        }

        if($award != 'awards'){
            $scholarships->where('award', 'like', '%' .  $award . '%');
        }

        if($level_of_study != 'study-levels'){
            if($level_of_study == 'Graduate') {
                $scholarships->where('level_of_study', $level_of_study);
            }
            else {
                $scholarships->where('level_of_study', $level_of_study);
            }
        }

        if($availability != 'availability'){
            $scholarships->where('availability', 'like', '%' .  $availability . '%');
        }

        $filteredScholarships = $scholarships->get();

        return view("frontend.school.single_school_scholarship_search", ['filteredScholarships' => $filteredScholarships, 'school' => $school]);

    }
}
