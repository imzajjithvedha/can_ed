<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\SchoolTypes;
use Excel;
use App\Imports\SchoolTypesImport; 
use Carbon\Carbon;

/**
 * Class SchoolTypesController.
 */
class SchoolTypesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.school_types.index');
    }

    public function createSchoolType()
    {
        return view('backend.school_types.create');
    }

    public function storeSchoolType(Request $request)
    {
        $user_id = auth()->user()->id;

        $type = new SchoolTypes;

        $type->user_id = $user_id;
        $type->name = $request->name;
        $type->description = $request->description;
        $type->status = 'Approved';

        $type->save();

        
        return redirect()->route('admin.types.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getSchoolTypes(Request $request)
    {
        if($request->ajax())
        {
            $data = SchoolTypes::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.types.edit_school_type', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" checked data-id='.$data->id.'></div>';
                    }else{
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" data-id='.$data->id.'></div>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        
        return back();
    }


    public function editSchoolType($id)
    {

        $type = SchoolTypes::where('id',$id)->first();

        return view('backend.school_types.edit',['type' => $type]);
    }

    public function updateSchoolType(Request $request)
    {    

        $type = DB::table('school_types') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.types.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteSchoolType($id)
    {
        $type = SchoolTypes::where('id', $id)->delete();
    }


    public function importSchoolTypes()
    {
        return view('backend.school_types.import');
    }

    public function import(Request $request)
    {
        Excel::import(new SchoolTypesImport, $request->file);

        return redirect()->route('admin.types.index')->withFlashSuccess('Uploaded Successfully');          
    }


    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $type = DB::table('school_types')->where('id', request('id'))->update(
            [
                'status' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }

}
