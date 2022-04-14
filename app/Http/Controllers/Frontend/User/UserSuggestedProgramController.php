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
use App\Mail\Frontend\ProgramUpdate;
use App\Mail\Frontend\UserProgramUpdate;
use App\Models\DegreeLevels;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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

        $programs = Programs::where('user_id', $user_id)->orderBy('name', 'asc')->get();

        return view('frontend.user.user_suggested_program.suggested_programs', ['programs' => $programs]);
    }

    public function suggestedProgramEdit($id)
    {
        $program = Programs::where('id', $id)->first();

        $degree_levels = DegreeLevels::where('status', 'Approved')->get();

        return view('frontend.user.user_suggested_program.suggested_programs_edit', ['program' => $program, 'degree_levels' => $degree_levels]);
    }


    public function suggestedProgramUpdate(Request $request)
    {
        
        $program = DB::table('programs') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'degree_level' => $request->degree_level,
                'description' => $request->description,
                'status' => 'Pending',
                'updated_at' => Carbon::now(),
            ]
        );


        if($request->status == 'Approved') {
            
            $details = [
                'name' => $request->name,
                'degree_level' => $request->degree_level,
                'description' => $request->description,
            ];
    
            Mail::to(['ccaned@gmail.com'])->send(new ProgramUpdate($details));
    
            Mail::to(auth()->user()->email)->send(new UserProgramUpdate());
        }
   
        return redirect()->route('frontend.user.suggested_programs')->with('success', 'success');    
    }



    public function suggestedProgramDelete($id)
    {
        $program = Programs::where('id', $id)->delete();

        return back();
    }
}
