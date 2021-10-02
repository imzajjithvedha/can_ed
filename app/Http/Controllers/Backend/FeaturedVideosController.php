<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use App\Models\FeaturedVideos; 

/**
 * Class FeaturedVideosController.
 */
class FeaturedVideosController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $videos = FeaturedVideos::get();

        return view('backend.featured_videos.index', ['videos' => $videos]);
    }

    public function featuredVideosUpdate(Request $request)
    {
        $user_id = auth()->user()->id;

        $video1 = DB::table('featured_videos')->where('id', 1)->update(
            [
                'user_id' => $user_id,
                'link' => $request->video1
            ]
        );

        $video2 = DB::table('featured_videos')->where('id', 2)->update(
            [
                'user_id' => $user_id,
                'link' => $request->video2
            ]
        );

        $video3 = DB::table('featured_videos')->where('id', 3)->update(
            [
                'user_id' => $user_id,
                'link' => $request->video3
            ]
        );

        $video4 = DB::table('featured_videos')->where('id', 4)->update(
            [
                'user_id' => $user_id,
                'link' => $request->video4
            ]
        );

        return back()->withFlashSuccess('Updated Successfully'); 
    }
}
