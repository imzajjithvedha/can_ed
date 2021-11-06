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
use App\Models\SchoolScholarshipsFAQ;

/**
 * Class UserSchoolScholarshipFAQController.
 */
class UserSchoolScholarshipFAQController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolScholarshipsFAQ()
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        $faqs = SchoolScholarshipsFAQ::where('user_id', $user_id)->get();

        return view('frontend.user.user_school.school_scholarships_faq', ['school' => $school, 'faqs' => $faqs]);

    }


    public function schoolScholarshipFAQCreate(Request $request)
    {

        $user_id = auth()->user()->id;

        $faq = new SchoolScholarshipsFAQ;

        $faq->user_id = $user_id;
        $faq->school_id = $request->hidden_id;
        $faq->question = $request->question;
        $faq->answer = $request->answer;


        $faq->save();

        return redirect()->route('frontend.user.school_scholarships_faq')->with('created', 'created');       
    }


    public function getSchoolScholarshipsFAQ(Request $request)
    {
        $user_id = auth()->user()->id;

        $data = SchoolScholarshipsFAQ::where('user_id', $user_id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.user.school_scholarship_faq_edit', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolScholarshipFAQEdit($id)
    {
        $faq = SchoolScholarshipsFAQ::where('id', $id)->first();

        return view('frontend.user.user_school.school_scholarships_faq_edit', ['faq' => $faq]);
    }


    public function schoolScholarshipFAQUpdate(Request $request) {

    
        $user_id = auth()->user()->id;

        $faq = DB::table('school_scholarships_faq')->where('id', request('hidden_id'))->update(
            [
                'question' => $request->question,
                'answer' => $request->answer,
            ]
        );
        
        return redirect()->route('frontend.user.school_scholarships_faq')->with('success', 'success');
    }

    public function SchoolScholarshipFAQDelete($id)
    {
        $faq = SchoolScholarshipsFAQ::where('id', $id)->delete();

        return back();
    }

}
