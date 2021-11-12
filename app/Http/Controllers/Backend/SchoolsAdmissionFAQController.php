<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use App\Models\SchoolAdmissionEmployees;
use App\Models\SchoolAdmissionFAQ;
use App\Models\Schools;

/**
 * Class SchoolsAdmissionFAQController.
 */
class SchoolsAdmissionFAQController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolAdmissionFAQ($id)
    {

        $school = Schools::where('id', $id)->first();

        $faqs = SchoolAdmissionFAQ::where('school_id', $id)->get();

        return view('backend.schools.admission_faq', ['school' => $school, 'faqs' => $faqs]);

    }


    public function schoolAdmissionFAQCreate(Request $request)
    {

        $user_id = auth()->user()->id;

        $faq = new SchoolAdmissionFAQ;

        $faq->user_id = $user_id;
        $faq->school_id = $request->hidden_id;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->orders = $request->orders;


        $faq->save();

        return back()->withFlashSuccess('Admission FAQ Added Successfully');
    }


    public function getSchoolAdmissionFAQ($id, Request $request)
    {

        $data = SchoolAdmissionFAQ::where('school_id', $id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('admin.schools.school_admission_faq_edit', [$data->school_id, $data->id]).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolAdmissionFAQEdit($id, $faq_id)
    {
        $faq = SchoolAdmissionFAQ::where('id', $faq_id)->first();

        $school = Schools::where('id', $id)->first();

        return view('backend.schools.admission_faq_edit', ['school' => $school, 'faq' => $faq]);
    }


    public function schoolAdmissionFAQUpdate(Request $request) {

    
        $id = $request->school_id;

        $faq = DB::table('school_admission_faq')->where('id', request('hidden_id'))->update(
            [
                'question' => $request->question,
                'answer' => $request->answer,
                'orders' => $request->orders,
            ]
        );
        
        return redirect()->route('admin.schools.school_admission_faq', $id)->withFlashSuccess('Updated Successfully');
    }

    public function SchoolAdmissionFAQDelete($id, $faq_id)
    {
        $faq = SchoolAdmissionFAQ::where('id', $faq_id)->delete();

        return back();
    }

}
