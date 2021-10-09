<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Businesses;
use App\Models\FeaturedVideos;

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

        $businesses = Businesses::where('status', 'Approved')->where('featured', 'Yes')->orderBy('updated_at', 'desc')->take(8)->get();

        $videos = FeaturedVideos::get();

        return view('frontend.index', ['articles' => $articles, 'featured_articles' => $featured_articles, 'businesses' => $businesses, 'videos' => $videos]);
    }
}
