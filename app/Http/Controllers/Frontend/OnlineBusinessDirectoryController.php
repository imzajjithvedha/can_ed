<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OnlineBusinessDirectory;

/**
 * Class OnlineBusinessDirectoryController.
 */
class OnlineBusinessDirectoryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $directories = OnlineBusinessDirectory::where('status', 'Approved')->get();

        return view('frontend.online_business_directory', ['directories' => $directories]);
    }
}
