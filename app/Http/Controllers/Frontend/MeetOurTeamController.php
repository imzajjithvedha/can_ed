<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use App\Models\OurTeam;

/**
 * Class MeetOurTeamController.
 */
class MeetOurTeamController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $team = Pages::where('name', 'meet_our_team')->first();
        $members = OurTeam::where('status', 'Approved')->get();

        return view('frontend.meet_our_team', ['team' => $team, 'members' => $members]);
    }
}
