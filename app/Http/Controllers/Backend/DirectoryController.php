<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Excel;
use App\Models\OnlineBusinessDirectory; 
use App\Imports\DirectoryImport; 

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

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/directory'), $imageName);

        $directory = new OnlineBusinessDirectory;

        $directory->user_id = $user_id;
        $directory->name = $request->name;
        $directory->description = $request->description;
        $directory->category = $request->category;
        $directory->phone = $request->phone;
        $directory->email = $request->email;
        $directory->image = $imageName;
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


    public function editDirectory($id)
    {

        $directory = OnlineBusinessDirectory::where('id',$id)->first();

        return view('backend.directory.edit',['directory' => $directory]);
    }

    public function updateDirectory(Request $request)
    {    

        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/directory'), $imageName);
        } 
        else {
            $imageName = $request->old_image;
        }
        
        $directory = DB::table('online_business_directory') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'category' => $request->category,
                'phone' => $request->phone,
                'email' => $request->email,
                'image' => $imageName,
                'status' => $request->status,
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

}
