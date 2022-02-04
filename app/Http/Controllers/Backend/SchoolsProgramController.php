<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use File;
use Excel;
use App\Models\Schools;
use App\Models\SchoolTypes;
use App\Models\Programs;
use App\Models\SchoolPrograms;
use App\Models\DegreeLevels;
use App\Imports\SchoolProgramsImport;
use Carbon\Carbon;

/**
 * Class SchoolsProgramController.
 */
class SchoolsProgramController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function schoolPrograms($id)
    {
        $school = Schools::where('id', $id)->first();

        $programs = Programs::where('status', 'Approved')->get();

        $degree_levels = DegreeLevels::where('status', 'Approved')->get();

        $school_programs = SchoolPrograms::get();

        return view('backend.schools.programs', ['school' => $school, 'programs' => $programs, 'degree_levels' => $degree_levels]);

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

        return back()->withFlashSuccess('Program Added Successfully');
    }


    public function getSchoolPrograms($id, Request $request)
    {
        $data = SchoolPrograms::where('school_id', $id)->get();

        if($request->ajax())
            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('admin.schools.school_program_edit', [$data->school_id, $data->id]).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm me-3" style="font-size: 0.6rem;"><i class="far fa-edit"></i> Edit </a>';
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

    public function schoolProgramEdit($id, $program_id)
    {
        $school_program = SchoolPrograms::where('id', $program_id)->first();

        $school = Schools::where('id', $id)->first();

        $programs = Programs::where('status', 'Approved')->get();

        $degree_levels = DegreeLevels::where('status', 'Approved')->get();

        return view('backend.schools.programs_edit', ['school' => $school, 'school_program' => $school_program, 'programs' => $programs, 'degree_levels' => $degree_levels]);
    }


    public function schoolProgramUpdate(Request $request) {

        $id = $request->school_id;

        $program = DB::table('school_programs') ->where('id', request('hidden_id'))->update(
            [
                'degree_level' => $request->degree_level,
                'program_id' => $request->title,
                'sub_title' => $request->sub_title,
                'updated_at' => Carbon::now(),
            ]
        );
        
        return redirect()->route('admin.schools.school_programs', $id)->withFlashSuccess('Updated Successfully');
    }

    public function SchoolProgramDelete($id, $program_id)
    {
        $program = SchoolPrograms::where('id', $program_id)->delete();

        return back();
    }


    public function schoolProgramsParagraphUpdate(Request $request) {

        $school = DB::table('schools') ->where('id', request('hidden_id'))->update(
            [
                'programs_title_1' => $request->title_1,
                'programs_page_paragraph' => $request->paragraph,
                'updated_at' => Carbon::now(),
            ]
        );
        
        return back()->withFlashSuccess('Updated Successfully');
    }


    public function importPrograms()
    {
        return view('backend.schools.programs_import');
    }

    public function import(Request $request)
    {
        Excel::import(new SchoolProgramsImport, $request->file);

        return redirect()->route('admin.schools.index')->withFlashSuccess('Uploaded Successfully');          
    }
}
