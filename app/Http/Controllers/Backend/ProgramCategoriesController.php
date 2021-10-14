<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Excel;
use App\Models\ProgramCategories; 
use App\Imports\ProgramCategoriesImport; 

/**
 * Class ProgramCategoriesController.
 */
class ProgramCategoriesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.program_categories.index');
    }


    public function storeProgramCategory(Request $request)
    {
        $user_id = auth()->user()->id;

        $program_category = new ProgramCategories;

        $program_category->user_id = $user_id;
        $program_category->name = $request->name;
        $program_category->status = 'Approved';


        $program_category->save();

        
        return redirect()->route('admin.program_categories.index')->withFlashSuccess('Created Successfully');                      
    }

    public function getProgramCategories(Request $request)
    {
        if($request->ajax())
        {
            $data = ProgramCategories::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.program_categories.edit_program_category', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
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


    public function editProgramCategory($id)
    {

        $program_category = ProgramCategories::where('id', $id)->first();

        return view('backend.program_categories.edit', ['program_category' => $program_category]);
    }

    public function updateProgramCategory(Request $request)
    {    
        
        $program_category = DB::table('program_categories') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'status' => $request->status
            ]
        );
   
        return redirect()->route('admin.program_categories.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteProgramCategory($id)
    {

        $program_category = ProgramCategories::where('id', $id)->delete();

    }


    public function importProgramCategories()
    {
        return view('backend.program_categories.import');
    }

    public function import(Request $request)
    {
        Excel::import(new ProgramCategoriesImport, $request->file);

        return redirect()->route('admin.program_categories.index')->withFlashSuccess('Uploaded Successfully');          
    }

}
