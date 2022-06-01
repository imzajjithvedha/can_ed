<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\JobsLogos;
use Carbon\Carbon;

/**
 * Class JobsLogosController.
 */
class JobsLogosController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.jobs_logos.index');
    }

    public function createLogo()
    {
        return view('backend.jobs_logos.create');
    }

    public function storeLogo(Request $request)
    {
        $user_id = auth()->user()->id;

        $image = $request->file('image');
        $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/logos'), $imageName);


        $jobs_logo = new JobsLogos;

        $jobs_logo->user_id = $user_id;
        $jobs_logo->name = $request->name;
        $jobs_logo->image = $imageName;
        $jobs_logo->status = 'Approved';
        $jobs_logo->orders = $request->orders;
        
        $jobs_logo->save();

        return redirect()->route('admin.logos.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getLogos(Request $request)
    {
        if($request->ajax())
        {
            $data = JobsLogos::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.logos.edit_logo', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->addColumn('image', function($data){
                    $img = '<img src="'.url('images/logos',$data->image).'" style="width: 30%">';
                 
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



                ->rawColumns(['action','image', 'status'])
                ->make(true);
        }
        
        return back();
    }


    public function editLogo($id)
    {

        $logo = JobsLogos::where('id', $id)->first();

        return view('backend.jobs_logos.edit',['logo' => $logo]);
    }

    public function updateLogo(Request $request)
    {    
        $image = $request->file('new_image');

        if($image != null) {
            $imageName = time().'_'.rand(1000,10000).'.'.$image->getClientOriginalExtension();
            
            $image->move(public_path('images/logos'),$imageName);
        } 
        else {
            $imageName = $request->old_image;
        }
        
        $logo = DB::table('jobs_logos') ->where('id', request('hidden_id'))->update(
            [
                'name' => $request->name,
                'image' => $imageName,
                'status' => $request->status,
                'orders' => $request->orders,
                'updated_at' => Carbon::now(),
            ]
        );
   
        return redirect()->route('admin.logos.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteLogo($id)
    {
        $logo = JobsLogos::where('id', $id)->delete();
    }


    public function changeStatus ($id, $status) {

        if($status == 0) {
            $value = 'Pending';
        }
        else {
            $value = 'Approved';
        }

        $logo = DB::table('jobs_logos')->where('id', request('id'))->update(
            [
                'status' => $value,
                'updated_at' => Carbon::now(),
            ]
        );
    }
}
