<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Illuminate\Http\Request;
use App\Mail\Frontend\ProgramAdmin;
use App\Mail\Frontend\ProgramUser;
use Illuminate\Support\Facades\Mail;

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

        return view('frontend.programs', ['programs' => $programs]);
    }

    public function programRequest(Request $request)
    {
        $user_id = auth()->user()->id;

        $program = new Programs;

        $program->user_id = $user_id;
        $program->name = $request->name;
        $program->description = $request->description;
        $program->status = 'Pending';

        $program->save();


        $details = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        Mail::to(['zajjith@gmail.com', 'ccaned@gmail.com'])->send(new ProgramAdmin($details));

        Mail::to(auth()->user()->email)->send(new ProgramUser());

        return back()->with('success', 'success'); 

    }
}
