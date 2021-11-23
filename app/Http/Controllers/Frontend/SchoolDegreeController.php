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
use App\Models\DegreeLevels;


/**
 * Class SchoolDegreeController.
 */
class SchoolDegreeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index($id, $slug) {

        $degree  = DegreeLevels::where('id', $id)->first();

        $school_programs = SchoolPrograms::where('degree_level', $id)->get();

        $schools = Schools::where('status', 'Approved')->get();

        $data = [];

        foreach ($school_programs as $school_program){ 
            foreach($schools as $school) {
                if($school_program->school_id == $school->id) {
                    array_push($data, $school);
                }
            }
        }

        $filteredSchools = array_unique($data);

        return view('frontend.school.school_degrees', ['filteredSchools' => $filteredSchools, 'degree' => $degree]);
    }
}
