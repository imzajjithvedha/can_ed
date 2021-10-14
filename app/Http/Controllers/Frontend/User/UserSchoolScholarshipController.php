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

        return view('frontend.user.school_scholarships', ['school' => $school, 'scholarships' => $scholarships]);

    }


    public function schoolScholarshipCreate(Request $request)
    {
        $user_id = auth()->user()->id;

        $scholarship = new SchoolScholarships;

        $scholarship->user_id = $user_id;
        $scholarship->school_id = $request->hidden_id;
        $scholarship->name = $request->name;
        $scholarship->provider = $request->provider;
        $scholarship->summary = $request->summary;
        $scholarship->amount = $request->amount;
        $scholarship->eligibility = json_encode($request->eligibility);
        $scholarship->award = $request->award;
        $scholarship->action = $request->action;
        $scholarship->deadline = $request->deadline;
        $scholarship->availability = $request->availability;
        $scholarship->level_of_study = $request->level_of_study;
        $scholarship->school_name = $request->school_name;

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

        return view('frontend.user.school_scholarship_edit', ['scholarship' => $scholarship]);
    }


    public function schoolScholarshipUpdate(Request $request) {

        $user_id = auth()->user()->id;

        $program = DB::table('school_scholarships') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'provider' => $request->provider,
                'summary' => $request->summary,
                'amount' => $request->amount,
                'eligibility' => json_encode($request->eligibility),
                'award' => $request->award,
                'action' => $request->action,
                'deadline' => $request->deadline,
                'availability' => $request->availability,
                'level_of_study' => $request->level_of_study,
                'school_name' => $request->school_name
            ]
        );
        
        return redirect()->route('frontend.user.school_scholarships')->with('success', 'success');     
    }

    public function SchoolScholarshipDelete($id)
    {
        $scholarship = SchoolScholarships::where('id', $id)->delete();

        return back();
    }
}
