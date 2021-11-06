<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\SchoolPrograms;
use App\Models\Programs;
use App\Models\Schools;
use App\Models\Businesses;
use App\Models\Articles;
use App\Models\SchoolTypes;


/**
 * Class SchoolTypeController.
 */
class SchoolTypeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function languagePrograms() {
        return view('frontend.school.language_programs');
    }


    public function getLanguagePrograms(Request $request) {

        $categories = Programs::where('degree_level', 'Language Programs')->where('status', 'Approved')->get();

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



    public function schoolsCategory() {

        $link = request()->segment(1);
        $type;

        if($link == 'community-schools') {

            $schools = Schools::where('school_type', 'Community College')->where('status', 'Approved')->get();

            $type = 'Community College';
        }
        elseif($link == 'bachelor-schools') {

            $schools = Schools::where('school_type', 'Bachelor Degree')->where('status', 'Approved')->get();

            $type = 'Bachelor Degree';
        }
        elseif($link == 'masters-schools') {

            $schools = Schools::where('school_type', 'Masters')->where('status', 'Approved')->get();

            $type = 'Masters';
        }
        elseif($link == 'certificate-schools') {

            $schools = Schools::where('school_type', 'Certificate / Short Term')->where('status', 'Approved')->get();

            $type = 'Certificate / Short Term';
        }
        elseif($link == 'summer-schools') {

            $schools = Schools::where('school_type', 'Summer')->where('status', 'Approved')->get();

            $type = 'Summer';
        }
        elseif($link == 'high-schools') {

            $schools = Schools::where('school_type', 'High School')->where('status', 'Approved')->get();

            $type = 'High School';
        }
        elseif($link == 'online-schools') {

            $schools = Schools::where('school_type', 'Online')->where('status', 'Approved')->get();

            $type = 'Online';
        }

        return view('frontend.school.school_types', ['schools' => $schools, 'type' => $type]);

        
    }


    // public function bachelorPrograms() {
    //     return view('frontend.bachelor_programs');
    // }


    // public function getBachelorPrograms(Request $request) {

    //     $categories = Programs::where('program_category', null)->where('status', 'Approved')->get();

    //     $programs = SchoolPrograms::get();

    //     $data = [];

    //     foreach ($programs as $program){ 
    //         foreach($categories as $category) {
    //             if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
    //                 array_push($data, $program);
    //             }
    //         }
    //     }

    //     if($request->ajax())

    //         {
    //             return DataTables::of($data)
                    
    //                 ->addColumn('action', function($data){
                        
    //                     $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

    //                     return $button;
    //                 })

    //                 ->addColumn('program_name', function($data){
    //                     $program_name = Programs::where('id', $data->program_id)->where('status', 'Approved')->first();

    //                     return $program_name->name;
                     
                        
    //                 })

    //                 ->addColumn('school_name', function($data){
    //                     $school_name = Schools::where('id', $data->school_id)->where('status', 'Approved')->first();
                        
    //                     return $school_name->name;

    //                 })

    //                 ->rawColumns(['action', 'program_name', 'school_name'])
    //                 ->make(true);
    //         }
            
    //     return back();
    // }




    // public function masterPrograms() {
    //     return view('frontend.master_programs');
    // }


    // public function getMasterPrograms(Request $request) {

    //     $categories = Programs::where('program_category', null)->where('status', 'Approved')->get();

    //     $programs = SchoolPrograms::get();

    //     $data = [];

    //     foreach ($programs as $program){ 
    //         foreach($categories as $category) {
    //             if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
    //                 array_push($data, $program);
    //             }
    //         }
    //     }

    //     if($request->ajax())

    //         {
    //             return DataTables::of($data)
                    
    //                 ->addColumn('action', function($data){
                        
    //                     $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

    //                     return $button;
    //                 })

    //                 ->addColumn('program_name', function($data){
    //                     $program_name = Programs::where('id', $data->program_id)->where('status', 'Approved')->first();

    //                     return $program_name->name;
                     
                        
    //                 })

    //                 ->addColumn('school_name', function($data){
    //                     $school_name = Schools::where('id', $data->school_id)->where('status', 'Approved')->first();
                        
    //                     return $school_name->name;

    //                 })

    //                 ->rawColumns(['action', 'program_name', 'school_name'])
    //                 ->make(true);
    //         }
            
    //     return back();
    // }



    // public function certificatePrograms() {
    //     return view('frontend.certificate_programs');
    // }


    // public function getCertificatePrograms(Request $request) {

    //     $categories = Programs::where('program_category', null)->where('status', 'Approved')->get();

    //     $programs = SchoolPrograms::get();

    //     $data = [];

    //     foreach ($programs as $program){ 
    //         foreach($categories as $category) {
    //             if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
    //                 array_push($data, $program);
    //             }
    //         }
    //     }

    //     if($request->ajax())

    //         {
    //             return DataTables::of($data)
                    
    //                 ->addColumn('action', function($data){
                        
    //                     $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

    //                     return $button;
    //                 })

    //                 ->addColumn('program_name', function($data){
    //                     $program_name = Programs::where('id', $data->program_id)->where('status', 'Approved')->first();

    //                     return $program_name->name;
                     
                        
    //                 })

    //                 ->addColumn('school_name', function($data){
    //                     $school_name = Schools::where('id', $data->school_id)->where('status', 'Approved')->first();
                        
    //                     return $school_name->name;

    //                 })

    //                 ->rawColumns(['action', 'program_name', 'school_name'])
    //                 ->make(true);
    //         }
            
    //     return back();
    // }



    // public function summerPrograms() {
    //     return view('frontend.summer_programs');
    // }


    // public function getSummerPrograms(Request $request) {

    //     $categories = Programs::where('program_category', null)->where('status', 'Approved')->get();

    //     $programs = SchoolPrograms::get();

    //     $data = [];

    //     foreach ($programs as $program){ 
    //         foreach($categories as $category) {
    //             if($category->id == $program->program_id && Schools::where('id', $program->school_id)->first()->status == 'Approved') {
    //                 array_push($data, $program);
    //             }
    //         }
    //     }

    //     if($request->ajax())

    //         {
    //             return DataTables::of($data)
                    
    //                 ->addColumn('action', function($data){
                        
    //                     $button = '<a href="'.route('frontend.single_school', $data->school_id).'" name="read" id="'.$data->id.'" class="btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); color:white; border: none; font-size: 0.8rem;">Read More</a>';

    //                     return $button;
    //                 })

    //                 ->addColumn('program_name', function($data){
    //                     $program_name = Programs::where('id', $data->program_id)->where('status', 'Approved')->first();

    //                     return $program_name->name;
                     
                        
    //                 })

    //                 ->addColumn('school_name', function($data){
    //                     $school_name = Schools::where('id', $data->school_id)->where('status', 'Approved')->first();
                        
    //                     return $school_name->name;

    //                 })

    //                 ->rawColumns(['action', 'program_name', 'school_name'])
    //                 ->make(true);
    //         }
            
    //     return back();
    // }
}
