<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VirtualTours;

/**
 * Class VirtualTourController.
 */
class VirtualTourController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $virtual_tours = VirtualTours::where('status', 'Approved')->OrderBy('updated_at', 'DESC')->get();

        return view('frontend.virtual_tours.virtual_tours', ['virtual_tours' => $virtual_tours]);
    }
}
