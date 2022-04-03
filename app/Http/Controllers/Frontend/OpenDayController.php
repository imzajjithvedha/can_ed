<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OpenDays;

/**
 * Class OpenDayController.
 */
class OpenDayController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $open_days = OpenDays::where('status', 'Approved')->OrderBy('title', 'ASC')->get();

        return view('frontend.open_days.open_days', ['open_days' => $open_days]);
    }

    public function singleOpenDay($id)
    {
        $open_day = OpenDays::where('id', $id)->first();

        $more_open_days = OpenDays::where('status', 'Approved')->where('id', '!=', $id)->inRandomOrder()->limit(5)->get();

        return view('frontend.open_days.single_open_day', ['open_day' => $open_day, 'more_open_days' => $more_open_days]);
    }
}
