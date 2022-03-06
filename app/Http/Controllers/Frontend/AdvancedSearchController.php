<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use DataTables;
use App\Models\Articles;
use App\Models\Businesses;
use App\Models\Videos;
use App\Models\Schools;
use App\Models\SchoolTypes;
use App\Models\Programs;
use App\Models\DegreeLevels;
use App\Models\SchoolPrograms;
use App\Models\WebsiteInformation;

/**
 * Class AdvancedSearchController.
 */
class AdvancedSearchController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public function index() {

        $information = WebsiteInformation::where('id', 1)->first();
        $degree_levels = DegreeLevels::where('status', 'Approved')->orderBy('orders', 'asc')->get();
        $programs = Programs::where('status', 'Approved')->orderBy('name', 'asc')->get();
        $school_types = SchoolTypes::where('status', 'Approved')->orderBy('name', 'asc')->get();

        return view('frontend.page.advanced_search', [
            'information' => $information,
            'degree_levels' => $degree_levels,
            'programs' => $programs,
            'school_types' => $school_types,
    ]);
    }

    public function advancedSearch(Request $request)
    {
        if(request('degree_level') != 'all') {
            $degree_level = request('degree_level');
        }
        else {
            $degree_level = 'degree-level';
        }

        if(request('field_of_study') != 'all') {
            $field_of_study = request('field_of_study');
        }
        else {
            $field_of_study = 'field-of-study';
        }

        if(request('start_date') != 'all') {
            $start_date = request('start_date');
        }
        else {
            $start_date = 'start-date';
        }

        if(request('online_distance_education') != 'all') {
            $online_distance_education = request('online_distance_education');
        }
        else {
            $online_distance_education = 'online-distance-education';
        }

        if(request('become') != null) {
            $become = request('become');
        }
        else {
            $become = 'become';
        }

        if(request('school_type') != 'all') {
            $school_type = request('school_type');
        }
        else {
            $school_type = 'school-type';
        }

        if(request('minimum_gpa') != 'all') {
            $minimum_gpa = request('minimum_gpa');
        }
        else {
            $minimum_gpa = 'minimum-gpa';
        }

        if(request('conditional_admission') != 'all') {
            $conditional_admission = request('conditional_admission');
        }
        else {
            $conditional_admission = 'conditional-admission';
        }

        if(request('graduate_program_type') != 'all') {
            $graduate_program_type = request('graduate_program_type');
        }
        else {
            $graduate_program_type = 'graduate-program-type';
        }

        if(request('under_graduate_program_type') != 'all') {
            $under_graduate_program_type = request('under_graduate_program_type');
        }
        else {
            $under_graduate_program_type = 'under-graduate-program-type';
        }

        if(request('study_method') != 'all') {
            $study_method = request('study_method');
        }
        else {
            $study_method = 'study-method';
        }

        if(request('delivery_mode') != 'all') {
            $delivery_mode = request('delivery_mode');
        }
        else {
            $delivery_mode = 'delivery-mode';
        }

        // if(request('tuition_range') != 'all') {
        //     $tuition_range = request('tuition_range');
        // }
        // else {
        //     $tuition_range = 'tuition-range';
        // }

        if(request('accommodation') != 'all') {
            $accommodation = request('accommodation');
        }
        else {
            $accommodation = 'accommodation';
        }

        if(request('work_on_campus') != 'all') {
            $work_on_campus = request('work_on_campus');
        }
        else {
            $work_on_campus = 'work-on-campus';
        }

        if(request('work_during_holidays') != 'all') {
            $work_during_holidays = request('work_during_holidays');
        }
        else {
            $work_during_holidays = 'work-during-holidays';
        }

        if(request('internship') != 'all') {
            $internship = request('internship');
        }
        else {
            $internship = 'internship';
        }

        if(request('co_op_education') != 'all') {
            $co_op_education = request('co_op_education');
        }
        else {
            $co_op_education = 'co-op-education';
        }

        if(request('job_placement') != 'all') {
            $job_placement = request('job_placement');
        }
        else {
            $job_placement = 'job-placement';
        }

        if(request('financial_aid_domestic') != 'all') {
            $financial_aid_domestic = request('financial_aid_domestic');
        }
        else {
            $financial_aid_domestic = 'financial-aid-domestic';
        }

        if(request('financial_aid_international') != 'all') {
            $financial_aid_international = request('financial_aid_international');
        }
        else {
            $financial_aid_international = 'financial-aid-international';
        }

        if(request('teaching_language') != 'all') {
            $teaching_language = request('teaching_language');
        }
        else {
            $teaching_language = 'teaching-language';
        }

        if(request('research') != 'all') {
            $research = request('research');
        }
        else {
            $research = 'research';
        }

        if(request('exchange_programs') != 'all') {
            $exchange_programs = request('exchange_programs');
        }
        else {
            $exchange_programs = 'exchange-programs';
        }

        if(request('degree_modifier') != 'all') {
            $degree_modifier = request('degree_modifier');
        }
        else {
            $degree_modifier = 'degree-modifier';
        }

        if(request('day_care') != 'all') {
            $day_care = request('day_care');
        }
        else {
            $day_care = 'day-care';
        }

        if(request('elementary_school') != 'all') {
            $elementary_school = request('elementary_school');
        }
        else {
            $elementary_school = 'elementary-school';
        }

        if(request('immigration_office') != 'all') {
            $immigration_office = request('immigration_office');
        }
        else {
            $immigration_office = 'immigration-office';
        }

        if(request('career_planning') != 'all') {
            $career_planning = request('career_planning');
        }
        else {
            $career_planning = 'career-planning';
        }

        if(request('pathway_programs') != 'all') {
            $pathway_programs = request('pathway_programs');
        }
        else {
            $pathway_programs = 'pathway-programs';
        }

        if(request('employment_rates') != 'all') {
            $employment_rates = request('employment_rates');
        }
        else {
            $employment_rates = 'employment-rates';
        }

        if(request('class_size_undergraduate') != 'all') {
            $class_size_undergraduate = request('class_size_undergraduate');
        }
        else {
            $class_size_undergraduate = 'class-size-undergraduate';
        }

        if(request('class_size_masters') != 'all') {
            $class_size_masters = request('class_size_masters');
        }
        else {
            $class_size_masters = 'class-size-masters';
        }

        if(request('service_and_guidance_new_students') != 'all') {
            $service_new_students = request('service_and_guidance_new_students');
        }
        else {
            $service_new_students = 'service-and-guidance-new-students';
        }

        if(request('service_and_guidance_new_arrivals') != 'all') {
            $service_new_arrivals = request('service_and_guidance_new_arrivals');
        }
        else {
            $service_new_arrivals = 'service-and-guidance-new-arrivals';
        }


        return redirect()->route('frontend.advanced_search_function', [ $degree_level, $field_of_study, $start_date, $online_distance_education, $become, $school_type, $minimum_gpa, $conditional_admission, $graduate_program_type, $under_graduate_program_type, $study_method, $delivery_mode, $accommodation, $work_on_campus, $work_during_holidays, $internship, $co_op_education, $job_placement, $financial_aid_domestic, $financial_aid_international, $teaching_language, $research, $exchange_programs, $degree_modifier, $day_care, $elementary_school, $immigration_office, $career_planning, $pathway_programs, $employment_rates, $class_size_undergraduate, $class_size_masters, $service_new_students, $service_new_arrivals ]);

    }

    public function advancedSearchFunction($degree_level, $field_of_study, $start_date, $online_distance_education, $become, $school_type, $minimum_gpa, $conditional_admission, $graduate_program_type, $under_graduate_program_type, $study_method, $delivery_mode, $accommodation, $work_on_campus, $work_during_holidays, $internship, $co_op_education, $job_placement, $financial_aid_domestic, $financial_aid_international, $teaching_language, $research, $exchange_programs, $degree_modifier, $day_care, $elementary_school, $immigration_office, $career_planning, $pathway_programs, $employment_rates, $class_size_undergraduate, $class_size_masters, $service_new_students, $service_new_arrivals)
    {

        $schools = Schools::where('status', 'Approved');


        // if($degree_level != 'degree-level') {

        //     $school_programs = SchoolPrograms::where('degree_level', $degree_level)->get();

        //     $schools = Schools::where('status', 'Approved')->get();

        //     $data = [];

        //     foreach ($school_programs as $school_program){ 
        //         foreach($schools as $school) {
        //             if($school_program->school_id == $school->id) {
        //                 array_push($data, $school);
        //             }
        //         }
        //     }

        //     $schools = collect(array_unique($data));
        // }

        // if($field_of_study != 'start-date'){
        //     $schools->where('start_date', $start_date);
        // }

        if($start_date != 'start-date'){
            $schools->where('start_date', $start_date);
        }

        if($online_distance_education != 'online-distance-education'){

            // dd($schools->all());
            $schools->where('online_distance_education', $online_distance_education);
        }

        // if($become != 'become'){

        //     $programs = Programs::where('name', 'like', '%' .  $become . '%')->where('status', 'Approved')->get();

        //     $school_programs = SchoolPrograms::get();

        //     $data = [];

        //     foreach ($programs as $program){ 
        //         foreach($school_programs as $school_program) {
        //             if($program->id == $school_program->program_id) {
        //                 array_push($data, $school_program);
        //             }
        //         }
        //     }

        //     foreach ($data as $da){ 
        //         foreach($schools->get() as $school) {
        //             if($da->school_id == $school->id) {
        //                 array_push($schools, $school);
                        
        //             }
        //         }
        //     }   
        // }

        if($school_type != 'school-type'){
            $schools->where('school_type', $school_type);
        }

        if($minimum_gpa != 'minimum-gpa'){
            $schools->where('minimum_gpa', $minimum_gpa);
        }

        if($conditional_admission != 'conditional-admission'){
            $schools->where('conditional_admission', $conditional_admission);
        }

        if($graduate_program_type != 'graduate-program-type'){
            $schools->where('graduate_program_type', $graduate_program_type);
        }

        if($under_graduate_program_type != 'under-graduate-program-type'){
            $schools->where('under_graduate_program_type', $under_graduate_program_type);
        }

        if($study_method != 'study-method'){
            $schools->where('study_method', $study_method);
        }

        if($delivery_mode != 'delivery-mode'){
            $schools->where('delivery_mode', $delivery_mode);
        }

        // if($tuition_range != 'tuition-range'){
        //     $schools->where('tuition_range', $tuition_range);
        // }

        if($accommodation != 'accommodation'){
            $schools->where('accommodation', $accommodation);
        }

        if($work_on_campus != 'work-on-campus'){
            $schools->where('work_on_campus', $work_on_campus);
        }

        if($work_during_holidays != 'work-during-holidays'){
            $schools->where('work_during_holidays', $work_during_holidays);
        }

        if($internship != 'internship'){
            $schools->where('internship', $internship);
        }

        if($co_op_education != 'co-op-education'){
            $schools->where('co_op_education', $co_op_education);
        }

        if($job_placement != 'job-placement'){
            $schools->where('job_placement', $job_placement);
        }

        if($financial_aid_domestic != 'financial-aid-domestic'){
            $schools->where('financial_aid_domestic', $financial_aid_domestic);
        }

        if($financial_aid_international != 'financial-aid-international'){
            $schools->where('financial_aid_international', $financial_aid_international);
        }

        if($teaching_language != 'teaching-language'){
            $schools->where('teaching_language', $teaching_language);
        }

        if($research != 'research'){
            $schools->where('research', $research);
        }

        if($exchange_programs != 'exchange-programs'){
            $schools->where('exchange_programs', $exchange_programs);
        }

        if($degree_modifier != 'degree-modifier'){
            $schools->where('degree_modifier', $degree_modifier);
        }

        if($day_care != 'day-care'){
            $schools->where('day_care', $day_care);
        }

        if($elementary_school != 'elementary-school'){
            $schools->where('elementary_school', $elementary_school);
        }

        if($immigration_office != 'immigration-office'){
            $schools->where('immigration_office', $immigration_office);
        }

        if($career_planning != 'career-planning'){
            $schools->where('career_planning', $career_planning);
        }

        if($pathway_programs != 'pathway-programs'){
            $schools->where('pathway_programs', $pathway_programs);
        }

        if($employment_rates != 'employment-rates'){
            $schools->where('employment_rates', $employment_rates);
        }

        if($class_size_undergraduate != 'class-size-undergraduate'){
            $schools->where('class_size_undergraduate', $class_size_undergraduate);
        }

        if($class_size_masters != 'class-size-masters'){
            $schools->where('class_size_masters', $class_size_masters);
        }

        if($service_new_students != 'service-and-guidance-new-students'){
            $schools->where('service_and_guidance_new_students', $service_new_students);
        }

        if($service_new_arrivals != 'service-and-guidance-new-arrivals'){
            $schools->where('service_and_guidance_new_arrivals', $service_new_arrivals);
        }

        // dd($schools);


        $filteredSchools = $schools->get();

        return view("frontend.page.advanced_schools_search", ['filteredSchools' => $filteredSchools]);

    }
}
