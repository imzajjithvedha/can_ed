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
use App\Models\SchoolPrograms;

/**
 * Class UserSuggestedProgramController.
 */
class UserSuggestedProgramController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    public function suggestedPrograms()
    {
        $user_id = auth()->user()->id;

        $programs = Programs::where('user_id', $user_id)->orderBy('updated_at', 'DESC')->get();

        return view('frontend.user.user_suggested_program.suggested_programs', ['programs' => $programs]);
    }

    public function suggestedProgramEdit($id)
    {
        $program = Programs::where('id', $id)->first();

        return view('frontend.user.user_suggested_program.suggested_programs_edit', ['program' => $program]);
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
