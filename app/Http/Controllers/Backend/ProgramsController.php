<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Excel;
use App\Models\Programs; 
use App\Imports\ProgramsImport; 

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
        return view('backend.programs.index');
    }

    public function createProgram()
    {
        return view('backend.programs.create');
    }

    public function storeProgram(Request $request)
    {
        $user_id = auth()->user()->id;

        $program = new Programs;

        $program->user_id = $user_id;
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

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<span class="badge bg-success">Approved</span>';
                    }else{
                        $status = '<span class="badge bg-warning text-dark">Pending</span>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return back();
    }


    public function editProgram($id)
    {

        $program = Programs::where('id',$id)->first();

        return view('backend.programs.edit',['program' => $program]);
    }

    public function updateProgram(Request $request)
    {    
        
        $program = DB::table('programs') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->title,
                'description' => $request->description,
                'status' => $request->status
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

}
