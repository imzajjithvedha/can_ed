<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Businesses; 
use DB;
use App\Models\Schools;
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

        return view('frontend.user.school_edit', ['school' => $school]);
    }


    // public function suggestedProgramUpdate(Request $request)
    // {
        
    //     $program = DB::table('programs') ->where('id', request('hidden_id'))->update(
    //         [
    //             'name' => $request->name,
    //             'description' => $request->description,
    //             'status' => 'Pending'
    //         ]
    //     );
   
    //     return redirect()->route('frontend.user.suggested_programs')->with('success', 'success');    
    // }



    // public function suggestedProgramDelete($id)
    // {
    //     $program = Programs::where('id', $id)->delete();

    //     return back();
    // }




    
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
