<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\Auth\User;
use App\Models\Auth\PasswordHistory;
use Auth;
use App\Models\Schools;

/**
 * Class UserSchoolSettingsController.
 */
class UserSchoolSettingsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function SchoolSettings()
    {
        return view('frontend.user.user_school.school_settings');
    }

    
    public function schoolDelete(Request $request)
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        if($school) {

            $school = Schools::where('user_id', $user_id)->delete();

            return redirect()->route('frontend.index')->with('school_deleted', 'school_deleted');
        }

    }
}
