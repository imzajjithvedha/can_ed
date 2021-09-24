<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Programs;

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
}
