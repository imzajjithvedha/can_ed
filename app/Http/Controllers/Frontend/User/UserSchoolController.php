<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses; 
use DB;
use File;
use App\Models\Schools;
use App\Models\SchoolTypes;
use App\Models\Programs;

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
        $user_id = auth()->user()->id;

        $schools = Schools::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.school_dashboard', ['schools' => $schools]);
    }

    public function userSchoolEdit($id)
    {
        $school = Schools::where('id', $id)->first();

        $school_types = SchoolTypes::where('status', 'Approved')->get();

        $images = json_decode($school->images);

        $links = json_decode($school->links);

        $programs = json_decode($school->programs);

        $scholarships = json_decode($school->scholarships);

        return view('frontend.user.school_edit', [
            'school' => $school,
            'images' => $images,
            'links' => $links,
            'school_types' => $school_types,
            'programs' => $programs,
            'scholarships' => $scholarships
        ]);
    }


    public function userInformationUpdate(Request $request) {
        $featured = $request->file('featured_image');

        if($featured != null) {
            $featured_image = time().'_'.rand(1000,10000).'.'.$featured->getClientOriginalExtension();
            
            $featured->move(public_path('images/schools'), $featured_image);
        } 
        else {
            $featured_image = $request->old_image;
        }

        $images = [];

        if($request->hasFile('new_images'))
         {

            foreach($request->file('new_images') as $image)
            {
                $name= time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();

                $image->move(public_path('images/schools'), $name); 

                array_push($images, $name); 
            }
         }
        else {

            
            $images = $request->old_images;
            
        }


        $link_name = $request->link_name;

        $links = $request->links;

        $output_json = [];

        
        if($link_name == null) {
            
            $link_name == null;
        }
        else {
            foreach($link_name as $key=>$link_item) {
                $data = [
                    'link_name' => $link_item,
                    'link' => $links[$key]
                ];
    
                array_push($output_json, $data);
            }
        }

        
        
        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'website' => $request->website,
                'country' => $request->country,
                'school_email' => $request->email,
                'school_phone' => $request->phone,
                'featured_image' => $featured_image,
                'images' => json_encode($images),
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'you_tube' => $request->you_tube,
                'linked_in' => $request->linked_in,
                'links' => json_encode($output_json),
                'status' => 'Pending'
            ]
        );
   
        return redirect()->route('frontend.user.school_dashboard')->with('success', 'success');    
    }

    public function userFactsUpdate(Request $request) {


        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'location' => $request->location,
                'school_type' => $request->school_type,
                'language' => $request->language,
                'undergraduates' => $request->undergraduates,
                'entrance_dates' => $request->entrance_dates,
                'canadian_tuition_fee' => $request->canadian_tuition_fee,
                'international_tuition_fee' => $request->international_tuition_fee,
                'telephone' => $request->telephone,
                'fax' => $request->fax,
                'address' => $request->address,
                'status' => 'Pending'
            ]
        );
   
        return redirect()->route('frontend.user.school_dashboard')->with('success', 'success');    
    }

    public function userOverviewUpdate(Request $request) {

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'location' => $request->location,
                'school_type' => $request->school_type,
                'language' => $request->language,
                'undergraduates' => $request->undergraduates,
                'entrance_dates' => $request->entrance_dates,
                'canadian_tuition_fee' => $request->canadian_tuition_fee,
                'international_tuition_fee' => $request->international_tuition_fee,
                'telephone' => $request->telephone,
                'fax' => $request->fax,
                'address' => $request->address,
                'status' => 'Pending'
            ]
        );
   
        return redirect()->route('frontend.user.school_dashboard')->with('success', 'success');    
    }


    public function userProgramsUpdate(Request $request) {


        $programs = $request->programs;

        $sub_titles = $request->sub_titles;

        $output_json = [];


        if($programs == null) {
 
            $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
                [
                    'programs' => '[]'
                ]
            );
        }
        else {
            foreach($programs as $key=>$program) {
                $data = [
                    'program_name' => $program,
                    'sub_title' => $sub_titles[$key]
                ];
    
                array_push($output_json, $data);
            }

            $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
                [
                    'programs' => $output_json
                ]
            );
        }

        return redirect()->route('frontend.user.school_dashboard')->with('success', 'success');    
    }




    public function userScholarshipsUpdate(Request $request) {

        $scholarship_name = $request->scholarship_name;
        $summary = $request->summary;
        $eligibility = $request->eligibility;
        $award = $request->award;
        $action = $request->action;
        $deadline = $request->deadline;
        $availability = $request->availability;
        $level_of_study = $request->level_of_study;

        $output_json = [];

        if($scholarship_name == null) {
 
            $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
                [
                    'scholarships_top' => $request->scholarship_paragraph_top,
                    'scholarships_bottom' => $request->scholarship_paragraph_bottom,
                    'scholarships' => '[]'
                ]
            );

        }
        else {
            foreach($scholarship_name as $key=>$scholarship) {

                if($key == 0) {
                    $data = [
                        'scholarship_name' => $scholarship,
                        'summary' => $summary[$key],
                        'eligibility' => [$eligibility[$key], $eligibility[$key+1], $eligibility[$key+2], $eligibility[$key+3], $eligibility[$key+4]],
                        'award' => $award[$key],
                        'action' => $action[$key],
                        'deadline' => $deadline[$key],
                        'availability' => $availability[$key],
                        'level_of_study' => $level_of_study[$key]
                    ];
                } else {
                    $data = [
                        'scholarship_name' => $scholarship,
                        'summary' => $summary[$key],
                        'eligibility' => [$eligibility[$key+4], $eligibility[$key+5], $eligibility[$key+6], $eligibility[$key+7], $eligibility[$key+8]],
                        'award' => $award[$key],
                        'action' => $action[$key],
                        'deadline' => $deadline[$key],
                        'availability' => $availability[$key],
                        'level_of_study' => $level_of_study[$key]
                    ];
                }
                

                array_push($output_json, $data);
            }

            $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
                [
                    'scholarships_top' => $request->scholarship_paragraph_top,
                    'scholarships_bottom' => $request->scholarship_paragraph_bottom,
                    'scholarships' => $output_json
                ]
            );
        }

        return redirect()->route('frontend.user.school_dashboard')->with('success', 'success');    
    }



    



    
    // suggested programs
    public function suggestedPrograms()
    {
        $user_id = auth()->user()->id;

        $programs = Programs::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.suggested_programs', ['programs' => $programs]);
    }

    public function suggestedProgramEdit($id)
    {
        $program = Programs::where('id', $id)->first();

        return view('frontend.user.suggested_programs_edit', ['program' => $program]);
    }


    public function suggestedProgramUpdate(Request $request)
    {
        
        $program = DB::table('programs') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'Pending'
            ]
        );
   
        return redirect()->route('frontend.user.suggested_programs')->with('success', 'success');    
    }



    public function suggestedProgramDelete($id)
    {
        $program = Programs::where('id', $id)->delete();

        return back();
    }
}
