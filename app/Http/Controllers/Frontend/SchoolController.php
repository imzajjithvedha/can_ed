<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schools;
use App\Mail\Frontend\School;
use App\Mail\Frontend\UserSchool;
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
use App\Models\DegreeLevels;
use App\Models\Programs;

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
            $school->province = $request->province;
            $school->user_email = $request->email;
            $school->user_phone = $request->phone;
            $school->message = $request->message;
            $school->slug = str_replace(" ", "-", $request->name);
            $school->status = 'Pending';
            $school->featured = 'No';
            $school->quick_facts_status = 'No';
            $school->overview_status = 'No';
            $school->programs_status = 'No';
            $school->admissions_status = 'No';
            $school->financial_status = 'No';
            $school->scholarships_status = 'No';
            $school->contacts_status = 'No';
            $school->overview_title_2_bullets = '[null, null, null, null, null, null, null, null, null, null]';
            $school->overview_title_12_bullets = '[null, null, null, null, null, null, null, null, null, null]';
            $school->admission_title_2_bullets = '[null, null, null, null, null, null, null, null, null, null]';

            $school->save();

            $details = [
                'name' => $request->name,
                'website' => $request->website,
                'reach_time' => $request->reach_time,
                'time_zone' => $request->time_zone,
                'province' => $request->province,
                'country' => $request->country,
                'user_email' => $request->email,
                'user_phone' => $request->phone,
                'message' => $request->message
            ];
    
            Mail::to(['ccaned@gmail.com'])->send(new School($details));

            Mail::to([$request->email])->send(new UserSchool($details));

            return redirect()->route('frontend.index')->with('success', 'success');
        }
    }

    public function schoolDegreeLevels()
    {
        $degrees = DegreeLevels::where('status', 'Approved')->orderBy('name', 'asc')->get();

        return view('frontend.school.school_degree_levels', ['degrees' => $degrees]);
    }

    public function schools($id)
    {
        $degree = DegreeLevels::where('id', $id)->first();

        $school_programs = SchoolPrograms::where('degree_level', $id)->get();

        $programs = $school_programs->unique('school_id');

        $all_schools = Schools::where('status', 'Approved')->get();

        $data = [];

        foreach ($programs as $program){ 
            foreach($all_schools as $all_school) {
                if($program->school_id == $all_school->id) {
                    array_push($data, $all_school);
                }
            }
        }

        $data = collect($data);

        $schools = $data->sortBy('name');

        return view('frontend.school.schools', ['schools' => $schools, 'degree' => $degree]);
    }

    
    public function singleSchool($id, $school_slug)
    {
        $school = Schools::where('id', $id)->first();


        $articles = Articles::where('status', 'Approved')->inRandomOrder()->limit(3)->get();

        $contacts = SchoolContacts::where('school_id', $id)->orderBy('orders', 'asc')->get();

        $total_programs = SchoolPrograms::where('school_id', $id)->get();
        $high_school_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 1)->get();
        $language_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 2)->get();
        $certificate_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 3)->get();
        $summer_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 4)->get();
        $community_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 5)->get();
        $bachelor_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 6)->get();
        $master_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 7)->get();
        $online_programs = SchoolPrograms::where('school_id', $id)->where('degree_level', 8)->get();


        $scholarships = SchoolScholarships::where('school_id', $id)->where('Featured', 'Yes')->orderBy('name', 'asc')->get();

        $scholarship_faqs = SchoolScholarshipsFAQ::where('school_id', $id)->orderBy('orders', 'asc')->get();
        
        $overview_faqs = SchoolOverviewFAQ::where('school_id', $id)->orderBy('orders', 'asc')->get();

        $admission_employees = SchoolAdmissionEmployees::where('school_id', $id)->orderBy('orders', 'asc')->get();

        // $admission_featured_employees = SchoolAdmissionEmployees::where('school_id', $id)->where('featured', 'Yes')->orderBy('orders', 'asc')->take(3)->get();

        $admission_faqs = SchoolAdmissionFAQ::where('school_id', $id)->orderBy('orders', 'asc')->get();

        $financial_faqs = SchoolFinancialFAQ::where('school_id', $id)->orderBy('orders', 'asc')->get();


        // School degree levels
        $programs = SchoolPrograms::where('school_id', $id)->get();

        $degree = $programs->unique('degree_level');

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



        // Marked facts
        if($school->marked_facts != null) {

            $marked_facts = json_decode($school->marked_facts);
            asort($marked_facts);

        }
        else {
            $marked_facts = null;
        }
        

        return view('frontend.school.single_school', [
            'school' => $school,
            'articles' => $articles,
            'contacts' => $contacts,
            'total_programs' => $total_programs,
            'high_school_programs' => $high_school_programs,
            'language_programs' => $language_programs,
            'certificate_programs' => $certificate_programs,
            'summer_programs' => $summer_programs,
            'community_programs' => $community_programs,
            'bachelor_programs' => $bachelor_programs,
            'master_programs' => $master_programs,
            'online_programs' => $online_programs,
            'scholarships' => $scholarships,
            'scholarship_faqs' => $scholarship_faqs,
            'overview_faqs' => $overview_faqs,
            'admission_employees' => $admission_employees,
            // 'admission_featured_employees' => $admission_featured_employees,
            'admission_faqs' => $admission_faqs,
            'financial_faqs' => $financial_faqs,
            'marked_facts' => $marked_facts,
            'prog' => $prog,
            'data' => $data
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

        if(request('scholarship_date') == 'all-scholarships') {
            $scholarship_date = 'all-scholarships';
        }
        else {
            $scholarship_date = request('scholarship_date');
        }

        $school_id = $request->school_id;

        $school_slug = Schools::where('id', $school_id)->first()->slug;

        return redirect()->route('frontend.school_scholarship_search_function', [ $school_id, $school_slug, $keyword, $award, $level_of_study, $availability, $scholarship_date]);

    }

    public function schoolScholarshipSearchFunction($school_id, $school_slug, $keyword, $award, $level_of_study, $availability, $scholarship_date)
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

        if($scholarship_date != 'all-scholarships'){
            if($scholarship_date == 'expired-scholarships') {
                $scholarships->where('deadline', '<', date("Y/m/d"));
            }
            else {
                $scholarships->where('deadline', '>', date("Y/m/d"));
            }
            
        }

        $filteredScholarships = $scholarships->get();

        return view("frontend.school.single_school_scholarship_search", ['filteredScholarships' => $filteredScholarships, 'school' => $school]);

    }


    public function singleSchoolScholarships($id, $school_slug)
    {
        $school = Schools::where('id', $id)->first();

        $scholarships = SchoolScholarships::where('school_id', $id)->orderBy('name', 'asc')->get();

        return view('frontend.school.single_school_scholarships', ['school' => $school, 'scholarships' => $scholarships]);
    }
}
