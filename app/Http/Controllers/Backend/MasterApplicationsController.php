<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Master; 
use App\Models\Schools; 

/**
 * Class MasterApplicationsController.
 */
class MasterApplicationsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.master.index');
    }

    // public function storeVideo(Request $request)
    // {
    //     $user_id = auth()->user()->id;

    //     $video = new Videos;

    //     $link = $request->link;

    //     $new_link = str_replace('watch?v=', 'embed/', $link);

    //     $video->user_id = $user_id;
    //     $video->title = $request->title;
    //     $video->link = $new_link;
    //     $video->featured = $request->featured;
    //     $video->status = 'Approved';

    //     $video->save();

        
    //     return redirect()->route('admin.videos.index')->withFlashSuccess('Created Successfully');                      
    // }

    public function getApplications(Request $request)
    {
        if($request->ajax())
        {
            $data = Master::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.master.view_application', $data->id).'" name="view" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> View </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->editColumn('name', function($data){
                    if($data->school_id != null){
                        $name = Schools::where('id', $data->school_id)->first()->name;
                    }else{
                        $name = '-';
                    }  

                    return $name;
                })

            
                ->rawColumns(['action', 'name'])
                ->make(true);
        }
        
        return back();
    }


    public function viewApplication($id)
    {
        $master = Master::where('id', $id)->first();

        return view('backend.master.edit', ['master' => $master]);
    }

    
    public function deleteApplication($id)
    {
        $master = Master::where('id', $id)->delete();
    }
}
