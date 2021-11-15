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
use App\Models\DegreeLevels;

/**
 * Class UserSchoolProgramController.
 */
class UserSchoolProgramController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolPrograms()
    {
        $user_id = auth()->user()->id;

        // $school_types = SchoolTypes::where('status', 'Approved')->get();

        $school = Schools::where('user_id', $user_id)->first();

        $programs = Programs::where('status', 'Approved')->get();

        $degree_levels = DegreeLevels::where('status', 'Approved')->get();

        $school_programs = SchoolPrograms::get();

        return view('frontend.user.user_school.school_programs', ['school' => $school, 'programs' => $programs, 'degree_levels' => $degree_levels]);

    }


    public function schoolProgramCreate(Request $request)
    {
        $user_id = auth()->user()->id;

        $program = new SchoolPrograms;

        $program->user_id = $user_id;
        $program->school_id = $request->hidden_id;
        $program->degree_level = $request->degree_level;
        $program->program_id = $request->title;
        $program->sub_title = $request->sub_title;

        $program->save();

        return redirect()->route('frontend.user.school_programs')->with('created', 'created');       
    }


    public function getSchoolPrograms(Request $request)
    {
        $user_id = auth()->user()->id;

        $school_id = Schools::where('user_id', $user_id)->first()->id;

        $data = SchoolPrograms::where('school_id', $school_id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.user.school_program_edit', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
                        $button .= '<a type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="color: white; font-size: 0.6rem;"><i class="far fa-trash-alt"></i> Delete </a>';

                        return $button;
                    })

                    ->addColumn('name', function($data){
                        $name = Programs::where('id', $data->program_id)->where('status', 'Approved')->first()->name;
                     
                        return $name;
                    })

                    ->addColumn('degree_level', function($data){

                        if($data->degree_level != null) {
                            $degree_level = DegreeLevels::where('id', $data->degree_level)->where('status', 'Approved')->first()->name;
                     
                            return $degree_level;
                        }
                        else {

                            $degree_level = '-';
                            
                            return $degree_level;
                        }
                        
                    })

                    ->rawColumns(['action', 'name', 'degree_level'])
                    ->make(true);
            }
            
            return back();
    }

    public function schoolProgramEdit($id)
    {
        $school_program = SchoolPrograms::where('id', $id)->first();

        $programs = Programs::where('status', 'Approved')->get();

        $degree_levels = DegreeLevels::where('status', 'Approved')->get();

        return view('frontend.user.user_school.school_program_edit', ['school_program' => $school_program, 'programs' => $programs, 'degree_levels' => $degree_levels]);
    }


    public function schoolProgramUpdate(Request $request) {

        $user_id = auth()->user()->id;

        $program = DB::table('school_programs') ->where('id', request('hidden_id'))->update(
            [
                'degree_level' => $request->degree_level,
                'program_id' => $request->title,
                'sub_title' => $request->sub_title
            ]
        );
        
        return redirect()->route('frontend.user.school_programs')->with('success', 'success');     
    }

    public function SchoolProgramDelete($id)
    {
        $program = SchoolPrograms::where('id', $id)->delete();

        return back();
    }


    public function schoolProgramsParagraphUpdate(Request $request) {

        $user_id = auth()->user()->id;

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'programs_title_1' => $request->title_1,
                'programs_page_paragraph' => $request->paragraph,
            ]
        );
        
        return redirect()->route('frontend.user.school_programs')->with('paragraph', 'paragraph');     
    }
}
