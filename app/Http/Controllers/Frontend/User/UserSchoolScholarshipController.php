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
use App\Models\SchoolScholarships;

/**
 * Class UserSchoolScholarshipController.
 */
class UserSchoolScholarshipController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolScholarships()
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        $scholarships = SchoolScholarships::where('user_id', $user_id)->get();

        return view('frontend.user.user_school.school_scholarships', ['school' => $school, 'scholarships' => $scholarships]);

    }


    public function schoolScholarshipCreate(Request $request)
    {

        $featured = $request->file('featured_image');

        $featured_image = time().'_'.rand(1000,10000).'.'.$featured->getClientOriginalExtension();
        
        $featured->move(public_path('images/schools'), $featured_image);
    

        $user_id = auth()->user()->id;

        $scholarship = new SchoolScholarships;

        $scholarship->user_id = $user_id;
        $scholarship->school_id = $request->hidden_id;
        $scholarship->name = $request->name;
        // $scholarship->provider = $request->provider;
        $scholarship->summary = $request->summary;
        // $scholarship->amount = $request->amount;
        $scholarship->eligibility = json_encode($request->eligibility);
        $scholarship->award = $request->award;
        $scholarship->action = $request->action;
        $scholarship->deadline = $request->deadline;
        $scholarship->availability = $request->availability;
        $scholarship->level_of_study = $request->level_of_study;
        // $scholarship->school_name = $request->school_name;
        // $scholarship->school_name = $request->school_name;
        $scholarship->image = $featured_image;

        $scholarship->save();

        return redirect()->route('frontend.user.school_scholarships')->with('created', 'created');       
    }


    public function getSchoolScholarships(Request $request)
    {
        $user_id = auth()->user()->id;

        $data = SchoolScholarships::where('user_id', $user_id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.user.school_scholarship_edit', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolScholarshipEdit($id)
    {
        $scholarship = SchoolScholarships::where('id', $id)->first();

        return view('frontend.user.user_school.school_scholarship_edit', ['scholarship' => $scholarship]);
    }


    public function schoolScholarshipUpdate(Request $request) {

        $featured = $request->file('featured_image');

        if($featured != null) {
            $featured_image = time().'_'.rand(1000,10000).'.'.$featured->getClientOriginalExtension();
            
            $featured->move(public_path('images/schools'), $featured_image);
        } 
        else {
            $featured_image = $request->old_image;
        }


        $user_id = auth()->user()->id;

        $program = DB::table('school_scholarships') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                // 'provider' => $request->provider,
                'summary' => $request->summary,
                // 'amount' => $request->amount,
                'eligibility' => json_encode($request->eligibility),
                'award' => $request->award,
                'action' => $request->action,
                'deadline' => $request->deadline,
                'availability' => $request->availability,
                'level_of_study' => $request->level_of_study,
                'image' => $featured_image,
                // 'school_name' => $request->school_name
            ]
        );
        
        return back()->with('success', 'success');     
    }

    public function SchoolScholarshipDelete($id)
    {
        $scholarship = SchoolScholarships::where('id', $id)->delete();

        return back();
    }


    public function schoolScholarshipsParagraphUpdate(Request $request) {

        $title_2_image = $request->file('scholarships_title_2_image');

        if($title_2_image != null) {
            $title_2_image_name = time().'_'.rand(1000,10000).'.'.$title_2_image->getClientOriginalExtension();
            
            $title_2_image->move(public_path('images/schools'), $title_2_image_name);
        } 
        else {
            $title_2_image_name = $request->scholarships_title_2_old_image;
        }


        $title_4_image = $request->file('scholarships_title_4_image');

        if($title_4_image != null) {
            $title_4_image_name = time().'_'.rand(1000,10000).'.'.$title_4_image->getClientOriginalExtension();
            
            $title_4_image->move(public_path('images/schools'), $title_4_image_name);
        } 
        else {
            $title_4_image_name = $request->scholarships_title_4_old_image;
        }

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'scholarships_title_1' => $request->scholarships_title_1,
                'scholarships_title_1_paragraph' => $request->scholarships_title_1_paragraph,
                'scholarships_text_content_1' => $request->scholarships_text_content_1,
                'scholarships_text_content_2' => $request->scholarships_text_content_2,
                'scholarships_title_2' => $request->scholarships_title_2,
                'scholarships_title_2_image' => $title_2_image_name,
                'scholarships_title_2_sub_title' => $request->scholarships_title_2_sub_title,
                'scholarships_title_2_paragraph' => $request->scholarships_title_2_paragraph,
                'scholarships_title_2_button' => $request->scholarships_title_2_button,
                'scholarships_title_2_link' => $request->scholarships_title_2_link,
                'scholarships_title_2_image_name' => $request->scholarships_title_2_image_name,
                'scholarships_title_3' => $request->scholarships_title_3,
                'scholarships_title_3_paragraph' => $request->scholarships_title_3_paragraph,
                'scholarships_text_content_3' => $request->scholarships_text_content_3,
                'scholarships_title_4' => $request->scholarships_title_4,
                'scholarships_title_4_image' => $title_4_image_name,
                'scholarships_title_4_sub_title' => $request->scholarships_title_4_sub_title,
                'scholarships_title_4_paragraph' => $request->scholarships_title_4_paragraph,
                'scholarships_title_4_button' => $request->scholarships_title_4_button,
                'scholarships_title_4_link' => $request->scholarships_title_4_link,
                'scholarships_title_4_image_name' => $request->scholarships_title_4_image_name,
            ]
        );
        
        return back()->with('paragraph', 'paragraph');     
    }
}
