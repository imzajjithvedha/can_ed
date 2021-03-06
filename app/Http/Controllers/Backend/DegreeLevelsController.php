<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\DegreeLevels;
use Excel;
use App\Imports\DegreeLevelsImport;
use Carbon\Carbon;

/**
 * Class DegreeLevelsController.
 */
class DegreeLevelsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.degree_levels.index');
    }

    public function createDegreeLevel()
    {
        return view('backend.degree_levels.create');
    }

    public function storeDegreeLevel(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/degree_levels'),$imageName);

        $type = new DegreeLevels;

        $slug_1 = str_replace(" ", "-", $request->name);

        $slug = str_replace("/", "", $slug_1);

        $type->user_id = $user_id;
        $type->name = $request->name;
        $type->description = $request->description;
        $type->icon = $imageName;
        $type->orders = $request->orders;
        $type->status = 'Approved';
        $type->slug = $slug;

        $type->save();

        
        return redirect()->route('admin.degree_levels.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getDegreeLevels(Request $request)
    {
        if($request->ajax())
        {
            $data = DegreeLevels::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.degree_levels.edit_degree_level', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->addColumn('icon', function($data){
                    if($data->icon != null) {
                        $img = '<img src="'.url('images/degree_levels', $data->icon).'" style="width: 20%">';
                    }
                    else {
                        $img = '-';
                    }
                   
                    return $img;
                })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" checked data-id='.$data->id.'></div>';
                    }else{
                        $status = '<div class="form-check form-switch"><input class="form-check-input status-check" type="checkbox" data-id='.$data->id.'></div>';
                    }   
                    return $status;
                })
                
                ->rawColumns(['action', 'icon', 'status'])
                ->make(true);
        }
        
        return back();
    }


    public function editDegreeLevel($id)
    {

        $level = DegreeLevels::where('id',$id)->first();

        return view('backend.degree_levels.edit', ['level' => $level]);
    }

    public function updateDegreeLevel(Request $request)
    {    
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/degree_levels'),$imageName);
        } 
        else {
            $imageName = $request->old_image;
        }

        $level = DB::table('degree_levels') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'icon' => $imageName,
                'status' => $request->status,
                'orders' => $request->orders,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.degree_levels.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteDegreeLevel($id)
    {
        $level = DegreeLevels::where('id', $id)->delete();
    }


    public function importDegreeLevels()
    {
        return view('backend.degree_levels.import');
    }

    public function import(Request $request)
    {
        Excel::import(new DegreeLevelsImport, $request->file);

        return redirect()->route('admin.degree_levels.index')->withFlashSuccess('Uploaded Successfully');          
    }

    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $level = DB::table('degree_levels')->where('id', request('id'))->update(
            [
                'status' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }

}
