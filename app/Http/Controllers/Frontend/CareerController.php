<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\AllCareers;
use App\Models\Articles;
use Illuminate\Http\Request;

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

        $careers = AllCareers::where('status', 'Approved')->orderBy('title', 'asc')->paginate(20);

        $articles = Articles::where('status', 'Approved')->inRandomOrder()->limit(5)->get();

        $hot_careers = AllCareers::where('status', 'Approved')->where('featured', 'Yes')->orderBy('level', 'asc')->get();

        return view('frontend.page.careers', ['how_careers' => $how_careers, 'hot_careers' => $hot_careers, 'careers' => $careers, 'articles' => $articles ]);
    }

    public function jobs()
    {
        $articles = Articles::where('status', 'Approved')->inRandomOrder()->limit(5)->get();

        return view('frontend.page.jobs', ['articles' => $articles]);
    }



    public function careerSearch(Request $request)
    {
        if(request('keyword') != null) {
            $career = request('keyword');
        }
        else {
            $career = 'career';
        }

        return redirect()->route('frontend.career_search_function', [$career]);

    }

    public function careerSearchFunction($career)
    {

        $careers = AllCareers::where('status', 'Approved');

        if($career != 'career'){
            $careers->where('title', 'like', '%' .  $career . '%');
        }
        else {
            $careers->orderBy('title', 'asc');
        }

        $filteredCareers = $careers->paginate(10);

        return view('frontend.page.careers_search', ['filteredCareers' => $filteredCareers]);

    }
}
