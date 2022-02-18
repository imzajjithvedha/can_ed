<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\SchoolScholarships;

/**
 * Class ScholarshipController.
 */
class ScholarshipController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $scholarships = SchoolScholarships::orderBy('name', 'ASC')->get();

        return view('frontend.page.scholarships', ['scholarships' => $scholarships]);
    }

    public function scholarshipSearch(Request $request)
    {
        if(request('keyword') != null) {
            $scholarship = request('keyword');
        }
        else {
            $scholarship = 'scholarship';
        }

        return redirect()->route('frontend.scholarship_search_function', [$scholarship]);

    }

    public function scholarshipSearchFunction($scholarship)
    {
        if($scholarship != 'scholarship'){
            $scholarships = SchoolScholarships::where('name', 'like', '%' .  $scholarship . '%');
        }
        else {
            $scholarships = SchoolScholarships::orderBy('name', 'asc');
        }

        $filteredScholarships = $scholarships->get();

        return view('frontend.page.scholarships_search', ['filteredScholarships' => $filteredScholarships]);

    }
}
