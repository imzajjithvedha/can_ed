<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Illuminate\Http\Request;
use App\Mail\Frontend\Program;
use App\Mail\Frontend\UserProgram;
use Illuminate\Support\Facades\Mail;
use App\Models\DegreeLevels;
use App\Models\Pages;
use App\Models\SchoolPrograms;
use App\Models\Schools;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ProgramController.
 */
class ProgramController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $programs = Programs::where('status', 'Approved')->orderBy('name', 'ASC')->get();

        $degree_levels = DegreeLevels::where('status', 'Approved')->get();

        $paragraph = Pages::where('name', 'programs')->first();

        return view('frontend.page.programs', ['programs' => $programs, 'degree_levels' => $degree_levels, 'paragraph' => $paragraph]);
    }

    public function programRequest(Request $request)
    {
        $user_id = auth()->user()->id;

        $program = new Programs;

        $program->user_id = $user_id;
        $program->name = $request->name;
        $program->degree_level = $request->degree_level;
        $program->description = $request->description;
        $program->status = 'Pending';

        $program->save();


        $details = [
            'name' => $request->name,
            'degree_level' => $request->degree_level,
            'description' => $request->description,
        ];

        Mail::to(['ccaned@gmail.com'])->send(new Program($details));

        Mail::to(auth()->user()->email)->send(new UserProgram());

        return back()->with('success', 'success'); 

    }


    public function programSchools($id)
    {
        $program_schools = SchoolPrograms::where('program_id', $id)->get();

        $schools = Schools::where('status', 'Approved')->get();

        $data = [];

        foreach ($program_schools as $program_school){ 
            foreach($schools as $school) {
                if($program_school->school_id == $school->id) {
                    array_push($data, $school);
                }
            }
        }


        $collection = collect($data);

        $data_1 = $collection->sortBy('name');

        $perPage       = 10;
        $currentPage   = Paginator::resolveCurrentPage() ?? 1;
        $itemsOnPage   = $data_1->skip(10 * ($currentPage-1))->take($perPage);
        $paginatorPath = Paginator::resolveCurrentPath();

        $filtered_schools     = new LengthAwarePaginator(
                $itemsOnPage,
                $collection->count(),
                $perPage,
                $currentPage,
                ['path' => $paginatorPath]
            );
 
        // $filtered_schools->values()->all();

        return view('frontend.page.program_schools', ['filtered_schools' => $filtered_schools]);
    }
}
