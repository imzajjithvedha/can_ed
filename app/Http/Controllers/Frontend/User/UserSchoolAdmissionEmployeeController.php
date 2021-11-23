<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use App\Models\SchoolAdmissionEmployees;
use App\Models\Schools;

/**
 * Class UserSchoolAdmissionEmployeeController.
 */
class UserSchoolAdmissionEmployeeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function schoolAdmissionEmployeeCreate(Request $request)
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
        $employee->more_1 = $request->more_1;
        $employee->email = $request->email;
        $employee->more_2 = $request->more_2;
        // $employee->featured = $request->featured;
        $employee->image = $image_call;
        $employee->orders = $request->orders;

        $employee->save();

        return redirect()->route('frontend.user.school_admission')->with('created', 'created');       
    }


    public function getSchoolAdmissionEmployees(Request $request)
    {
        $user_id = auth()->user()->id;

        $school_id = Schools::where('user_id', $user_id)->first()->id;

        $data = SchoolAdmissionEmployees::where('school_id', $school_id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.user.school_admission_employee_edit', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolAdmissionEmployeeEdit($id)
    {
        $employee = SchoolAdmissionEmployees::where('id', $id)->first();

        return view('frontend.user.user_school.school_admission_employee_edit', ['employee' => $employee]);
    }


    public function schoolAdmissionEmployeeUpdate(Request $request) {

        $user_id = auth()->user()->id;

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
                'more_1' => $request->more_1,
                'email' => $request->email,
                'more_2' => $request->more_2,
                // 'featured' => $request->featured,
                'image' => $image_call,
                'orders' => $request->orders,
            ]
        );
        
        return redirect()->route('frontend.user.school_admission')->with('success', 'success');     
    }

    public function SchoolAdmissionEmployeeDelete($id)
    {
        $employee = SchoolAdmissionEmployees::where('id', $id)->delete();

        return back();
    }
}
