<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Videos;

/**
 * Class VideoController.
 */
class VideoController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $videos = Videos::where('status', 'Approved')->get();

        return view('frontend.video.videos', ['videos' => $videos]);
    }
}
