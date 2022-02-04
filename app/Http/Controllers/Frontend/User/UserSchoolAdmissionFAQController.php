<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use App\Models\SchoolAdmissionEmployees;
use App\Models\SchoolAdmissionFAQ;
use App\Models\Schools;
use Carbon\Carbon;

/**
 * Class UserSchoolAdmissionFAQController.
 */
class UserSchoolAdmissionFAQController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolAdmissionFAQ()
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        $faqs = SchoolAdmissionFAQ::where('user_id', $user_id)->get();

        return view('frontend.user.user_school.school_admission_faq', ['school' => $school, 'faqs' => $faqs]);

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

        return redirect()->route('frontend.user.school_admission_faq')->with('created', 'created');       
    }


    public function getSchoolAdmissionFAQ(Request $request)
    {
        $user_id = auth()->user()->id;

        $school_id = Schools::where('user_id', $user_id)->first()->id;

        $data = SchoolAdmissionFAQ::where('school_id', $school_id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.user.school_admission_faq_edit', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolAdmissionFAQEdit($id)
    {
        $faq = SchoolAdmissionFAQ::where('id', $id)->first();

        return view('frontend.user.user_school.school_admission_faq_edit', ['faq' => $faq]);
    }


    public function schoolAdmissionFAQUpdate(Request $request) {

    
        $user_id = auth()->user()->id;

        $faq = DB::table('school_admission_faq')->where('id', request('hidden_id'))->update(
            [
                'question' => $request->question,
                'answer' => $request->answer,
                'orders' => $request->orders,
                'updated_at' => Carbon::now(),
            ]
        );
        
        return redirect()->route('frontend.user.school_admission_faq')->with('success', 'success');
    }

    public function SchoolAdmissionFAQDelete($id)
    {
        $faq = SchoolAdmissionFAQ::where('id', $id)->delete();

        return back();
    }

}
