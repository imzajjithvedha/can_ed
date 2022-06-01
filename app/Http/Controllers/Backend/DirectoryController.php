<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Excel;
use App\Models\OnlineBusinessDirectory; 
use App\Imports\DirectoryImport;
use Carbon\Carbon;

/**
 * Class DirectoryController.
 */
class DirectoryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.directory.index');
    }

    public function createDirectory()
    {
        return view('backend.directory.create');
    }

    public function storeDirectory(Request $request)
    {
        $user_id = auth()->user()->id;

        $directory = new OnlineBusinessDirectory;

        $directory->user_id = $user_id;
        $directory->name = $request->name;
        $directory->address = $request->address;
        $directory->city = $request->city;
        $directory->province = $request->province;
        $directory->postal_code = $request->postal_code;
        $directory->phone = $request->phone;
        $directory->fax = $request->fax;
        $directory->industry = $request->industry;
        $directory->status = 'Approved';


        $directory->save();

        
        return redirect()->route('admin.directory.index')->withFlashSuccess('Created Successfully');                      
    }

    public function getDirectory(Request $request)
    {
        if($request->ajax())
        {
            $data = OnlineBusinessDirectory::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.directory.edit_directory', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
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
                
                ->rawColumns(['action','status'])
                ->make(true);
        }
        return back();
    }


    public function editDirectory($id)
    {

        $directory = OnlineBusinessDirectory::where('id',$id)->first();

        return view('backend.directory.edit',['directory' => $directory]);
    }

    public function updateDirectory(Request $request)
    {    


        $directory = DB::table('online_business_directory') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
                'postal_code' => $request->postal_code,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'industry' => $request->industry,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.directory.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteDirectory($id)
    {

        $directory = OnlineBusinessDirectory::where('id', $id)->delete();

    }


    public function importDirectory()
    {
        return view('backend.directory.import');
    }

    public function import(Request $request)
    {
        Excel::import(new DirectoryImport, $request->file);

        return redirect()->route('admin.directory.index')->withFlashSuccess('Uploaded Successfully');          
    }



    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $directory = DB::table('online_business_directory')->where('id', request('id'))->update(
            [
                'status' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }

}
