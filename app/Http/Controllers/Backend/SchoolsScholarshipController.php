<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses; 
use DB;
use DataTables;
use File;
use Excel;
use App\Models\Schools;
use App\Models\SchoolTypes;
use App\Models\Programs;
use App\Models\SchoolScholarships;
use App\Imports\SchoolScholarshipsImport;
use Carbon\Carbon;

/**
 * Class SchoolsScholarshipController.
 */
class SchoolsScholarshipController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolScholarships($id)
    {
        $school = Schools::where('id', $id)->first();

        $scholarships = SchoolScholarships::where('school_id', $id)->get();

        return view('backend.schools.scholarships', ['school' => $school, 'scholarships' => $scholarships]);

    }


    public function schoolScholarshipCreate(Request $request)
    {

        $featured = $request->file('featured_image');

        $featured_image = time().'_'.rand(1000,10000).'.'.$featured->getClientOriginalExtension();
        
        $featured->move(public_path('images/schools'), $featured_image);
    

        $user_id = auth()->user()->id;

        $scholarship = new SchoolScholarships;

        $scholarship->user_id = $user_id;
        $scholarship->name = $request->name;
        $scholarship->province = $request->province;
        $scholarship->summary = $request->summary;
        $scholarship->amount = $request->amount;
        $scholarship->school_id = $request->hidden_id;
        $scholarship->eligibility = json_encode($request->eligibility);
        $scholarship->province = $request->province;
        $scholarship->award = $request->award;
        $scholarship->availability = $request->availability;
        $scholarship->level_of_study = $request->level_of_study;
        $scholarship->action = $request->action;
        $scholarship->duration = $request->duration;
        $scholarship->date_posted = $request->date_posted;
        $scholarship->expiry_date = $request->expiry_date;
        $scholarship->deadline = $request->deadline;
        $scholarship->image = $featured_image;
        $scholarship->link = $request->link;
        $scholarship->more_info = $request->more_info;
        $scholarship->featured = $request->featured;

        $scholarship->save();

        return back()->withFlashSuccess('Scholarship Added Successfully');
    }


    public function getSchoolScholarships($id, Request $request)
    {

        $data = SchoolScholarships::where('school_id', $id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('admin.schools.school_scholarship_edit', [$data->school_id, $data->id]).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->editColumn('featured', function($data){
                        if($data->featured == 'Yes'){
                            $featured = '<div class="form-check form-switch"><input class="form-check-input featured-check" type="checkbox" checked data-id='.$data->id.'></div>';
                        }else{
                            $featured = '<div class="form-check form-switch"><input class="form-check-input featured-check" type="checkbox" data-id='.$data->id.'></div>';
                        }   
                        return $featured;
                    })

                    ->rawColumns(['action', 'featured'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolScholarshipEdit($id, $scholarship_id)
    {
        $school = Schools::where('id', $id)->first();

        $scholarship = SchoolScholarships::where('id', $scholarship_id)->first();

        return view('backend.schools.scholarships_edit', ['school' => $school, 'scholarship' => $scholarship]);
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

        $id = $request->school_id;

        $program = DB::table('school_scholarships') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'school_id' => $request->school_id,
                'province' => $request->province,
                'summary' => $request->summary,
                'amount' => $request->amount,
                'eligibility' => json_encode($request->eligibility),
                'award' => $request->award,
                'availability' => $request->availability,
                'province' => $request->province,
                'level_of_study' => $request->level_of_study,
                'action' => $request->action,
                'duration' => $request->duration,
                'date_posted' => $request->date_posted,
                'expiry_date' => $request->expiry_date,
                'deadline' => $request->deadline,
                'image' => $featured_image,
                'link' => $request->link,
                'more_info' => $request->more_info,
                'featured' => $request->featured,
                'updated_at' => Carbon::now(),
            ]
        );
        
        return redirect()->route('admin.schools.school_scholarships', $id)->withFlashSuccess('Updated Successfully');
    }

    public function SchoolScholarshipDelete($id, $scholarship_id)
    {
        $scholarship = SchoolScholarships::where('id', $scholarship_id)->delete();

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
                'updated_at' => Carbon::now(),
            ]
        );
        
        return back()->withFlashSuccess('Updated Successfully');
    }


    public function importScholarships()
    {
        return view('backend.schools.scholarships_import');
    }

    public function import(Request $request)
    {
        Excel::import(new SchoolScholarshipsImport, $request->file);

        return redirect()->route('admin.schools.index')->withFlashSuccess('Uploaded Successfully');          
    }


    public function changeFeatured ($id, $status) {

        if($status == 0) {
            $value = 'No';
        }
        else {
            $value = 'Yes';
        }

        $scholarship = DB::table('school_scholarships')->where('id', request('id'))->update(
            [
                'featured' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }

}
