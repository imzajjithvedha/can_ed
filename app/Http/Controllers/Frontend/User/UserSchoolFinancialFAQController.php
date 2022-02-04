<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use App\Models\SchoolFinancialFAQ;
use App\Models\Schools;
use Carbon\Carbon;

/**
 * Class UserSchoolFinancialFAQController.
 */
class UserSchoolFinancialFAQController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolFinancialFAQ()
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        $faqs = SchoolFinancialFAQ::where('user_id', $user_id)->get();

        return view('frontend.user.user_school.school_financial_faq', ['school' => $school, 'faqs' => $faqs]);

    }


    public function schoolFinancialFAQCreate(Request $request)
    {

        $user_id = auth()->user()->id;

        $faq = new SchoolFinancialFAQ;

        $faq->user_id = $user_id;
        $faq->school_id = $request->hidden_id;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->orders = $request->orders;


        $faq->save();

        return redirect()->route('frontend.user.school_financial_faq')->with('created', 'created');       
    }


    public function getSchoolFinancialFAQ(Request $request)
    {
        $user_id = auth()->user()->id;

        $school_id = Schools::where('user_id', $user_id)->first()->id;

        $data = SchoolFinancialFAQ::where('school_id', $school_id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.user.school_financial_faq_edit', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolFinancialFAQEdit($id)
    {
        $faq = SchoolFinancialFAQ::where('id', $id)->first();

        return view('frontend.user.user_school.school_financial_faq_edit', ['faq' => $faq]);
    }


    public function schoolFinancialFAQUpdate(Request $request) {

        $user_id = auth()->user()->id;

        $faq = DB::table('school_financial_faq')->where('id', request('hidden_id'))->update(
            [
                'question' => $request->question,
                'answer' => $request->answer,
                'orders' => $request->orders,
                'updated_at' => Carbon::now(),
            ]
        );
        
        return redirect()->route('frontend.user.school_financial_faq')->with('success', 'success');
    }

    public function SchoolFinancialFAQDelete($id)
    {
        $faq = SchoolFinancialFAQ::where('id', $id)->delete();

        return back();
    }

}
