<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\SchoolPrograms;
use App\Models\Programs;
use App\Models\Schools;
use App\Models\Businesses;


/**
 * Class ProgramsSearchController.
 */
class ProgramsSearchController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function languagePrograms() {
        return view('frontend.language_programs');
    }


    public function getLanguagePrograms(Request $request) {
        $categories = Programs::where('program_category', 'Language Programs')->where('status', 'Approved')->get();

        $programs = SchoolPrograms::get();


        $data = [];

        foreach ($programs as $program){ 
            foreach($categories as $category) {
                if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
                    array_push($data, $program);
                }
            }
        }

        if($request->ajax())

            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

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
            
        return back();
    }



    public function collegePrograms() {
        return view('frontend.college_programs');
    }


    public function getCollegePrograms(Request $request) {

        $categories = Programs::where('program_category', null)->where('status', 'Approved')->get();

        $programs = SchoolPrograms::get();

        $data = [];

        foreach ($programs as $program){ 
            foreach($categories as $category) {
                if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
                    array_push($data, $program);
                }
            }
        }

        if($request->ajax())

            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

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
            
        return back();
    }



    public function bachelorPrograms() {
        return view('frontend.bachelor_programs');
    }


    public function getBachelorPrograms(Request $request) {

        $categories = Programs::where('program_category', null)->where('status', 'Approved')->get();

        $programs = SchoolPrograms::get();

        $data = [];

        foreach ($programs as $program){ 
            foreach($categories as $category) {
                if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
                    array_push($data, $program);
                }
            }
        }

        if($request->ajax())

            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

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
            
        return back();
    }




    public function masterPrograms() {
        return view('frontend.master_programs');
    }


    public function getMasterPrograms(Request $request) {

        $categories = Programs::where('program_category', null)->where('status', 'Approved')->get();

        $programs = SchoolPrograms::get();

        $data = [];

        foreach ($programs as $program){ 
            foreach($categories as $category) {
                if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
                    array_push($data, $program);
                }
            }
        }

        if($request->ajax())

            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

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
            
        return back();
    }



    public function certificatePrograms() {
        return view('frontend.certificate_programs');
    }


    public function getCertificatePrograms(Request $request) {

        $categories = Programs::where('program_category', null)->where('status', 'Approved')->get();

        $programs = SchoolPrograms::get();

        $data = [];

        foreach ($programs as $program){ 
            foreach($categories as $category) {
                if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
                    array_push($data, $program);
                }
            }
        }

        if($request->ajax())

            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

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
            
        return back();
    }



    public function summerPrograms() {
        return view('frontend.summer_programs');
    }


    public function getSummerPrograms(Request $request) {

        $categories = Programs::where('program_category', null)->where('status', 'Approved')->get();

        $programs = SchoolPrograms::get();

        $data = [];

        foreach ($programs as $program){ 
            foreach($categories as $category) {
                if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
                    array_push($data, $program);
                }
            }
        }

        if($request->ajax())

            {
                return DataTables::of($data)
                    
                    ->addColumn('action', function($data){
                        
                        $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

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
            
        return back();
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

            return redirect()->route('frontend.school_search_function', [$keyword]);

        }
        elseif(request('type') == 'businesses') {

            if(request('keyword') != null) {
                $keyword = request('keyword');
            }
            else {
                $keyword = 'business';
            }

            return redirect()->route('frontend.business_search_function', [$keyword]);

        }
        
    }

    public function schoolSearchFunction($keyword)
    {
        $schools = Schools::where('status', 'Approved');

        if($keyword != 'school'){
            $schools->where('name', 'like', '%' .  $keyword . '%');
        }

        $filteredSchools = $schools->get();

        return view('frontend.home_school_search', ['filteredSchools' => $filteredSchools]);

    }

    public function businessSearchFunction($keyword)
    {
        $businesses = Businesses::where('status', 'Approved');

        if($keyword != 'business'){
            $businesses->where('name', 'like', '%' .  $keyword . '%');
        }

        $filteredBusinesses = $businesses->get();

        return view('frontend.home_businesses_search', ['filteredBusinesses' => $filteredBusinesses]);

    }

}
