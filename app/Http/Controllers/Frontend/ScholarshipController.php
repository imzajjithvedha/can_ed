<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\SchoolScholarships;
use App\Models\FavoriteScholarships;
use App\Models\Schools;

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
        $scholarships = SchoolScholarships::orderBy('name', 'ASC')->paginate(10);

        return view('frontend.page.scholarships', ['scholarships' => $scholarships]);
    }


    public function singleScholarship($id)
    {
        $single_scholarship = SchoolScholarships::where('id', $id)->first();

        $more_scholarships = SchoolScholarships::where('id', '!=', $id)->inRandomOrder()->limit(5)->get();

        return view('frontend.page.single_scholarship', ['single_scholarship' => $single_scholarship, 'more_scholarships' => $more_scholarships]);
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

        $filteredScholarships = $scholarships->paginate(10);

        return view('frontend.page.scholarships_search', ['filteredScholarships' => $filteredScholarships]);

    }



    public function favoriteScholarship(Request $request) {

        $scholarship_id = $request->hidden_id;
        $status = $request->favorite;
        $user_id = auth()->user()->id;


        if($status == 'non-favorite') {

            $favorite = new FavoriteScholarships;

            $favorite->user_id = $user_id; 

            $favorite->scholarship_id = $scholarship_id;

            $favorite -> save();

            return back();
        }

        if($status == 'favorite') {

            $favorite = FavoriteScholarships::where('user_id', $user_id)->where('scholarship_id', $scholarship_id)->delete();

            return back();
        }
    }





    public function advancedSearch(Request $request)
    {
        if(request('name') != null) {
            $name = request('name');
        }
        else {
            $name = 'name';
        }

        if(request('school') != null) {
            $school = request('school');
        }
        else {
            $school = 'school';
        }

        if(request('province') != null) {
            $province = request('province');
        }
        else {
            $province = 'province';
        }

        if(request('award') != null) {
            $award = request('award');
        }
        else {
            $award = 'award';
        }

        if(request('action') != null) {
            $action = request('action');
        }
        else {
            $action = 'action';
        }

        if(request('provider') != null) {
            $provider = request('provider');
        }
        else {
            $provider = 'provider';
        }

        if(request('min_amount') != null) {
            $min_amount = request('min_amount');
        }
        else {
            $min_amount = 'min-amount';
        }

        if(request('max_amount') != null) {
            $max_amount = request('max_amount');
        }
        else {
            $max_amount = 'max-amount';
        }

        if(request('duration') != null) {
            $duration = request('duration');
        }
        else {
            $duration = 'duration';
        }

        return redirect()->route('frontend.scholarship_advanced_search_function', [
            $name,
            $school,
            $province,
            $award,
            $action,
            $provider,
            $min_amount,
            $max_amount,
            $duration
        ]);

    }

    public function advancedSearchFunction($name, $school, $province, $award, $action, $provider, $min_amount,
    $max_amount, $duration)
    {
        if($name != 'name'){
            $scholarships = SchoolScholarships::where('name', 'like', '%' .  $name . '%');
        }

        if($school != 'school'){

            $school_id = Schools::where('name', 'like', '%' .  $school . '%')->first();

            if($school_id) {
                $scholarships = SchoolScholarships::where('school_id', $school_id->id);
            }
            else {
                $scholarships = SchoolScholarships::where('school_id', '==' , null);
            }
        }

        if($province != 'province'){
            $scholarships = SchoolScholarships::where('province', $province);
        }

        if($award != 'award'){
            $scholarships = SchoolScholarships::where('award', $award);
        }

        if($action != 'action'){
            $scholarships = SchoolScholarships::where('action', 'like', '%' .  $action . '%');
        }

        if($provider != 'provider'){
            $scholarships = SchoolScholarships::where('provider', $provider);
        }

        if($min_amount != 'min-amount' && $max_amount != 'max-amount'){
            $scholarships = SchoolScholarships::where('amount', '>=', $min_amount)->where('amount', '<=', $max_amount);
        }
        
        if($min_amount != 'min-amount' && $max_amount == 'max-amount'){
            $scholarships = SchoolScholarships::where('amount', '>=', $min_amount);
        }

        if($min_amount == 'min-amount' && $max_amount != 'max-amount'){
            $scholarships = SchoolScholarships::where('amount', '<=', $max_amount);
        }

        if($duration != 'duration'){
            $scholarships = SchoolScholarships::where('duration', $duration);
        }

        if ($name == 'name' && $school == 'school' && $province == 'province' && $award == 'award' && $provider == 'provider' && $min_amount == 'min-amount' && $max_amount == 'max-amount' && $duration == 'duration') {
            $filteredScholarships = SchoolScholarships::paginate(10);
        }
        else {
            $filteredScholarships = $scholarships->paginate(10);
        }

        return view('frontend.page.scholarships_search', ['filteredScholarships' => $filteredScholarships]);

    }
}
