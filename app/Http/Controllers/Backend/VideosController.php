<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\Videos; 

/**
 * Class VideosController.
 */
class VideosController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.videos.index');
    }

    public function storeVideo(Request $request)
    {
        $user_id = auth()->user()->id;

        $video = new Videos;

        $link = $request->link;

        $new_link = str_replace('watch?v=', 'embed/', $link);

        $video->user_id = $user_id;
        $video->title = $request->title;
        $video->link = $new_link;
        $video->featured = $request->featured;
        $video->status = 'Approved';

        $video->save();

        
        return redirect()->route('admin.videos.index')->withFlashSuccess('Created Successfully');                      
    }


    public function getVideos(Request $request)
    {
        if($request->ajax())
        {
            $data = Videos::get();

            return DataTables::of($data)

                ->addColumn('action', function($data){
                    
                    $button = '<a href="'.route('admin.videos.edit_video', $data->id).'" name="edit" id="'.$data->id.'" class="edit btn btn-secondary btn-sm ml-3" style="margin-right: 10px"><i class="far fa-edit"></i> Edit </a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>';
                    return $button;
                })

                ->editColumn('featured', function($data){
                    if($data->featured == 'Yes'){
                        $featured = '<span class="badge bg-success">Yes</span>';
                    }else{
                        $featured = '<span class="badge bg-warning text-dark">No</span>';
                    }   
                    return $featured;
                })

                ->editColumn('status', function($data){
                    if($data->status == 'Approved'){
                        $status = '<span class="badge bg-success">Approved</span>';
                    }else{
                        $status = '<span class="badge bg-warning text-dark">Pending</span>';
                    }   
                    return $status;
                })

                ->rawColumns(['action', 'featured', 'status'])
                ->make(true);
        }
        
        return back();
    }


    public function editVideo($id)
    {

        $video = Videos::where('id', $id)->first();

        return view('backend.videos.edit', ['video' => $video]);
    }

    public function updateVideo(Request $request)
    {    
        $link = $request->link;

        $new_link = str_replace('watch?v=', 'embed/', $link);

        $video = DB::table('videos') ->where('id', request('hidden_id'))->update(
            [
                'title' => $request->title,
                'link' => $new_link,
                'description' => $request->description,
                'featured' => $request->featured,
                'status' => $request->status
            ]
        );
   
        return redirect()->route('admin.videos.index')->withFlashSuccess('Updated Successfully');                      

    }

    public function deleteVideo($id)
    {
        $video = Videos::where('id', $id)->delete();
    }
}
