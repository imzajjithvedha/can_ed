<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Excel;
use App\Models\Programs; 
use App\Imports\ProgramsImport;
use App\Models\DegreeLevels;
use App\Models\Pages;
use Carbon\Carbon;

/**
 * Class ProgramsController.
 */
class ProgramsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $paragraph = Pages::where('name', 'programs')->first();

        return view('backend.programs.index', ['paragraph' => $paragraph]);
    }

    public function createProgram()
    {
        $degree_levels = DegreeLevels::where('status', 'Approved')->get();

        return view('backend.programs.create', ['degree_levels' => $degree_levels]);
    }

    public function storeProgram(Request $request)
    {
        $user_id = auth()->user()->id;

        $program = new Programs;

        if($request->degree_level != null) {
            $degree_level = $request->degree_level;
        }
        else {
            $degree_level = null;
        }
        

        $program->user_id = $user_id;
        $program->degree_level = $degree_level;
        $program->name = $request->title;
        $program->description = $request->description;
        $program->status = 'Approved';


        $program->save();

        
        return redirect()->route('admin.programs.index')->withFlashSuccess('Created Successfully');                      
    }

    public function getPrograms(Request $request)
    {
        if($request->ajax())
        {
            $data = Programs::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.programs.edit_program', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                // ->editColumn('degree_level', function($data){
                //     if($data->degree_level != null){

                //         $degree_level = $data->degree_level;

                //     }else{
                //         $degree_level = '-';
                //     }   

                //     return $degree_level;
                // })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" checked data-id='.$data->id.'></div>';
                    }else{
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" data-id='.$data->id.'></div>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action','status', 'degree_level'])
                ->make(true);
        }
        return back();
    }


    public function editProgram($id)
    {
        $program = Programs::where('id',$id)->first();

        $degree_levels = DegreeLevels::where('status', 'Approved')->get();

        return view('backend.programs.edit',['program' => $program, 'degree_levels' => $degree_levels]);
    }

    public function updateProgram(Request $request)
    {    
        if($request->degree_level != null) {
            $degree_level = $request->degree_level;
        }
        else {
            $degree_level = null;
        }

        $program = DB::table('programs') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->title,
                'degree_level' => $degree_level,
                'description' => $request->description,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.programs.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteProgram($id)
    {

        $program = Programs::where('id', $id)->delete();

    }


    public function importPrograms()
    {
        return view('backend.programs.import');
    }

    public function import(Request $request)
    {
        Excel::import(new ProgramsImport, $request->file);

        return redirect()->route('admin.programs.index')->withFlashSuccess('Uploaded Successfully');          
    }



    // Programs paragraph
    public function programsParagraphUpdate(Request $request)
    {
        $paragraph = DB::table('pages') ->where('name', 'programs')->update(
            [
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }


    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $program = DB::table('programs')->where('id', request('id'))->update(
            [
                'status' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }

}
