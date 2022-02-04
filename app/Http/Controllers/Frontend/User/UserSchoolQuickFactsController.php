<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses; 
use DB;
use DataTables;
use File;
use App\Models\Schools;
use App\Models\SchoolTypes;
use App\Models\Programs;
use App\Models\SchoolPrograms;
use Carbon\Carbon;

/**
 * Class UserSchoolQuickFactsController.
 */
class UserSchoolQuickFactsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    public function schoolQuickFacts()
    {
        $user_id = auth()->user()->id;

        $school_types = SchoolTypes::where('status', 'Approved')->get();

        $school = Schools::where('user_id', $user_id)->first();

        $marked_facts = json_decode($school->marked_facts);

        return view('frontend.user.user_school.school_quick_facts', ['school' => $school, 'school_types' => $school_types, 'marked_facts' => $marked_facts]);

    }


    public function schoolQuickFactsUpdate(Request $request) {

        if($request->marked_facts != null) {
            $marked = json_encode($request->marked_facts);
        }
        else {
            $marked = null;
        }

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'location' => $request->location,
                'school_type' => $request->school_type,
                'language' => $request->language,
                'undergraduates' => $request->undergraduates,
                'entrance_dates' => $request->entrance_dates,
                'canadian_tuition_fee' => $request->canadian_tuition_fee,
                'international_tuition_fee' => $request->international_tuition_fee,
                'school_phone' => $request->telephone,
                'fax' => $request->fax,
                'address' => $request->address,
                'start_date' => $request->start_date,
                'online_distance_education' => $request->online_distance_education,
                'minimum_gpa' => $request->minimum_gpa,
                'conditional_admission' => $request->conditional_admission,
                'graduate_program_type' => $request->graduate_program_type,
                'under_graduate_program_type' => $request->under_graduate_program_type,
                'study_method' => $request->study_method,
                'delivery_mode' => $request->delivery_mode,
                'tuition_range' => $request->tuition_range,
                'accommodation' => $request->accommodation,
                'work_on_campus' => $request->work_on_campus,
                'work_during_holidays' => $request->work_during_holidays,
                'internship' => $request->internship,
                'co_op_education' => $request->co_op_education,
                'job_placement' => $request->job_placement,
                'financial_aid_domestic' => $request->financial_aid_domestic,
                'financial_aid_international' => $request->financial_aid_international,
                'research' => $request->research,
                'exchange_programs' => $request->exchange_programs,
                'degree_modifier' => $request->degree_modifier,
                'day_care' => $request->day_care,
                'elementary_school' => $request->elementary_school,
                'immigration_office' => $request->immigration_office,
                'career_planning' => $request->career_planning,
                'pathway_programs' => $request->pathway_programs,
                'employment_rates' => $request->employment_rates,
                'class_size_undergraduate' => $request->class_size_undergraduate,
                'class_size_masters' => $request->class_size_masters,
                'service_and_guidance_new_students' => $request->service_and_guidance_new_students,
                'service_and_guidance_new_arrivals' => $request->service_and_guidance_new_arrivals,
                'marked_facts' => $marked,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('frontend.user.school_quick_facts')->with('success', 'success');    
    }

    public function schoolQuickFactsParagraphsUpdate(Request $request) {

        $featured = $request->file('quick_facts_title_2_image');

        if($featured != null) {
            $featured_image = time().'_'.rand(1000,10000).'.'.$featured->getClientOriginalExtension();
            
            $featured->move(public_path('images/schools'), $featured_image);
        } 
        else {
            $featured_image = $request->old_image;
        }

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'quick_facts_title_1' => $request->quick_facts_title_1,
                'quick_facts_title_1_paragraph' => $request->quick_facts_title_1_paragraph,
                'quick_facts_title_2' => $request->quick_facts_title_2,
                'quick_facts_title_2_image' => $featured_image,
                'quick_facts_title_2_sub_title' => $request->quick_facts_title_2_sub_title,
                'quick_facts_title_2_paragraph' => $request->quick_facts_title_2_paragraph,
                'quick_facts_title_2_button' => $request->quick_facts_title_2_button,
                'quick_facts_title_2_link' => $request->quick_facts_title_2_link,
                'quick_facts_title_2_image_name' => $request->quick_facts_title_2_image_name,
                'updated_at' => Carbon::now(),
            ]
        );
        
        return back()->with('paragraph', 'paragraph');     
    }
}
