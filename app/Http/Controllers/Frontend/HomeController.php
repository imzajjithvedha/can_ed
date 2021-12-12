<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Articles;
use App\Models\Businesses;
use App\Models\Videos;
use App\Models\Schools;
use App\Models\SchoolTypes;
use App\Models\Programs;
use App\Models\DegreeLevels;
use App\Models\SchoolPrograms;
use App\Models\WebsiteInformation;
use App\Models\Events;

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

        $featured_schools = Schools::where('status', 'Approved')->where('featured', 'Yes')->orderBy('updated_at', 'desc')->take(8)->get();

        $featured_events = Events::where('status', 'Approved')->where('featured', 'Yes')->orderBy('updated_at', 'desc')->take(4)->get();

        $school_types = SchoolTypes::where('status', 'Approved')->orderBy('name', 'asc')->get();

        $degree_levels = DegreeLevels::where('status', 'Approved')->orderBy('orders', 'asc')->get();

        $programs = Programs::where('status', 'Approved')->orderBy('name', 'asc')->get();

        $videos = Videos::where('featured', 'Yes')->where('status', 'Approved')->orderBy('updated_at', 'desc')->get();

        $information = WebsiteInformation::where('id', 1)->first();

        $student_services = Businesses::where('status', 'Approved')->where('student_service', 'Yes')->orderBy('updated_at', 'desc')->take(4)->get();

        return view('frontend.index', 
        [
            'articles' => $articles,
            'featured_articles' => $featured_articles,
            'featured_businesses' => $featured_businesses,
            'featured_schools' => $featured_schools,
            'featured_events' => $featured_events,
            'videos' => $videos,
            'school_types' => $school_types,
            'programs' => $programs,
            'degree_levels' => $degree_levels,
            'information' => $information,
            'student_services' => $student_services,
        ]);
    }

    // banner search
    public function homeSearch(Request $request)
    {
        if(request('type') == 'schools') {

            if(request('keyword') != null) {
                $keyword = request('keyword');
            }
            else {
                $keyword = 'schools';
            }

            return redirect()->route('frontend.home_school_search_function', [$keyword]);

        }
        elseif(request('type') == 'businesses') {

            if(request('keyword') != null) {
                $keyword = request('keyword');
            }
            else {
                $keyword = 'businesses';
            }

            return redirect()->route('frontend.home_business_search_function', [$keyword]);

        }
        elseif(request('type') == 'programs') {

            if(request('keyword') != null) {
                $keyword = request('keyword');
            }
            else {
                $keyword = 'programs';
            }

            return redirect()->route('frontend.home_program_search_function', [$keyword]);
        }
        elseif(request('type') == 'articles') {

            if(request('keyword') != null) {
                $keyword = request('keyword');
            }
            else {
                $keyword = 'articles';
            }

            return redirect()->route('frontend.home_article_search_function', [$keyword]);
        }
    }

    public function schoolSearchFunction($keyword)
    {
        $schools = Schools::where('status', 'Approved');

        if($keyword != 'schools'){
            $schools->where('name', 'like', '%' .  $keyword . '%');
        }

        $filteredSchools = $schools->get();

        return view('frontend.page.home_schools_search', ['filteredSchools' => $filteredSchools]);

    }

    public function businessSearchFunction($keyword)
    {
        $businesses = Businesses::where('status', 'Approved');

        if($keyword != 'businesses'){
            $businesses->where('name', 'like', '%' .  $keyword . '%');
        }

        $filteredBusinesses = $businesses->get();

        return view('frontend.page.home_businesses_search', ['filteredBusinesses' => $filteredBusinesses]);

    }


    public function programSearchFunction(Request $request, $keyword)
    {
        $programs = Programs::where('status', 'Approved');

        if($keyword != 'programs'){
            $programs->where('name', 'like', '%' .  $keyword . '%');
        }

        $filteredPrograms = $programs->get();

        $school_programs = SchoolPrograms::get();

        $data = [];

        foreach ($school_programs as $school_program){ 
            foreach($filteredPrograms as $filteredProgram) {
                if($filteredProgram->id == $school_program->program_id && Schools::where('id', $school_program->school_id)->first()->status == 'Approved') {
                    array_push($data, $school_program);
                }
            }
        }

        if($request->ajax())

            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.single_school', [$data->school_id, Schools::where('id', $data->school_id)->first()->slug]).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

                        return $button;
                    })

                    ->addColumn('program_name', function($data){
                        $program_name = Programs::where('id', $data->program_id)->where('status', 'Approved')->first();

                        return $program_name->name;
                     
                        
                    })

                    ->addColumn('school_name', function($data){
                        $school_name = Schools::where('id', $data->school_id)->where('status', 'Approved')->first();
                        
                        return $school_name->name;

                    })

                    ->rawColumns(['action', 'program_name', 'school_name'])
                    ->make(true);
            }
            
            return view('frontend.page.home_programs_search', ['keyword' => $keyword]);
    }


    public function articleSearchFunction($keyword)
    {
        $articles = Articles::where('status', 'Approved');

        if($keyword != 'articles'){
            $articles->where('title', 'like', '%' .  $keyword . '%');
        }

        $filteredArticles = $articles->get();

        return view('frontend.page.home_articles_search', ['filteredArticles' => $filteredArticles]);

    }
}
