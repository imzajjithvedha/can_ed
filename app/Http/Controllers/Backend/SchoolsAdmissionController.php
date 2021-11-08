<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use App\Models\Schools;
use App\Models\SchoolAdmissionEmployees;

/**
 * Class SchoolsAdmissionController.
 */
class SchoolsAdmissionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolAdmission($id)
    {
        $school = Schools::where('id', $id)->first();

        return view('backend.schools.admission', ['school' => $school]);

    }

    public function schoolAdmissionCreate(Request $request)
    {

        $user_id = auth()->user()->id;

        $image = $request->file('featured_image');
        $image_call = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension(); 
        $image->move(public_path('images/schools'), $image_call);
        

        $employee = new SchoolAdmissionEmployees;

        $employee->user_id = $user_id;
        $employee->school_id = $request->hidden_id;
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->description = $request->description;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->featured = $request->featured;
        $employee->image = $image_call;

        $employee->save();

        return back()->withFlashSuccess('Employee Added Successfully');
    }


    public function getSchoolAdmission($id, Request $request)
    {

        $data = SchoolAdmissionEmployees::where('school_id', $id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('admin.schools.school_admission_edit', [$data->school_id, $data->id]).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolAdmissionEdit($id, $employee__id)
    {
        $employee = SchoolAdmissionEmployees::where('id', $employee__id)->first();

        $school = Schools::where('id', $id)->first();

        return view('backend.schools.admission_edit', ['school' => $school, 'employee' => $employee]);
    }


    public function schoolAdmissionUpdate(Request $request) {

        $id = $request->school_id;

        $image = $request->file('featured_image');

        if($image != null) {
            $image_call = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/schools'), $image_call);
        } 
        else {
            $image_call = $request->old_image;
        }

        $employee = DB::table('school_admission_employees') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'phone' => $request->phone,
                'email' => $request->email,
                'featured' => $request->featured,
                'image' => $image_call,
            ]
        );
        
        return redirect()->route('admin.schools.school_admission', $id)->withFlashSuccess('Updated Successfully');
    }

    public function SchoolAdmissionDelete($id, $employee_id)
    {
        $employee = SchoolAdmissionEmployees::where('id', $employee_id)->delete();

        return back();
    }

    public function schoolAdmissionParagraphUpdate(Request $request) {

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'admission_paragraph' => $request->admission_paragraph,
                'admission_title_1' => $request->admission_title_1,
                'admission_title_1_paragraph' => $request->admission_title_1_paragraph,
                'admission_text_content_1' => $request->admission_text_content_1,
                'admission_title_2' => $request->admission_title_2,
                'admission_title_2_bullets' => json_encode($request->admission_title_2_bullets),
                'admission_title_3' => $request->admission_title_3,
                'admission_title_3_paragraph' => $request->admission_title_3_paragraph,
                'admission_title_4' => $request->admission_title_4,
                'admission_title_4_paragraph' => $request->admission_title_4_paragraph,
                'admission_title_5' => $request->admission_title_5,
                'admission_title_5_paragraph' => $request->admission_title_5_paragraph,
            ]
        );
        
        return back()->withFlashSuccess('Updated Successfully');
    }
}
