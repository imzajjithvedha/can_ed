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

        Mail::to(['zajjith@gmail.com'])->send(new Program($details));

        Mail::to(auth()->user()->email)->send(new UserProgram());

        return back()->with('success', 'success'); 

    }
}
