<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\AllCareers;
use App\Models\Articles;

/**
 * Class CareerController.
 */
class CareerController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function careers()
    {
        $how_careers = Pages::where('name', 'how_these_career_came_about')->first();

        $hot_careers = Pages::where('name', 'hot_careers')->first();

        $careers = AllCareers::where('status', 'Approved')->get();

        $more_articles = Articles::where('status', 'Approved')->inRandomOrder()->limit(5)->get();

        return view('frontend.page.careers', ['how_careers' => $how_careers, 'hot_careers' => $hot_careers, 'careers' => $careers, 'more_articles' => $more_articles]);
    }

    public function jobs()
    {
        return view('frontend.page.jobs');
    }
}
