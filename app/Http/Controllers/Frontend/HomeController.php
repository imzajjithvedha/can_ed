<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Businesses;
use App\Models\Videos;
use App\Models\SchoolTypes;
use App\Models\Programs;
use App\Models\DegreeLevels;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Articles::where('status', 'Approved')->orderBy('id', 'desc')->take(4)->get();

        $featured_articles = Articles::where('status', 'Approved')->where('featured', 'Yes')->orderBy('updated_at', 'desc')->take(4)->get();

        $featured_businesses = Businesses::where('status', 'Approved')->where('featured', 'Yes')->orderBy('updated_at', 'desc')->take(8)->get();

        $school_types = SchoolTypes::where('status', 'Approved')->orderBy('name', 'asc')->get();

        $degree_levels = DegreeLevels::where('status', 'Approved')->orderBy('name', 'asc')->get();

        $programs = Programs::where('status', 'Approved')->orderBy('name', 'asc')->get();


        $videos = Videos::where('featured', 'Yes')->where('status', 'Approved')->get();


        return view('frontend.index', 
        [
            'articles' => $articles,
            'featured_articles' => $featured_articles,
            'featured_businesses' => $featured_businesses,
            'videos' => $videos,
            'school_types' => $school_types,
            'programs' => $programs,
            'degree_levels' => $degree_levels
        ]);
    }
}
