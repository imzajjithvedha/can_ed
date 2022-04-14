<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\Auth\User;
use App\Models\Auth\PasswordHistory;
use Auth;
use App\Models\Schools;
use Carbon\Carbon;
use App\Mail\Frontend\SchoolDelete;
use Illuminate\Support\Facades\Mail;


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
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        return view('frontend.user.user_school.school_settings', ['school' => $school]);
    }

    
    public function schoolDelete(Request $request)
    {
        $user_id = auth()->user()->id;

        $school = Schools::where('user_id', $user_id)->first();

        if($school) {

            $school = Schools::where('user_id', $user_id)->delete();

            $details = [
                'name' => auth()->user()->name
            ];

            Mail::to(auth()->user()->email)->send(new SchoolDelete($details));

            return redirect()->route('frontend.index')->with('school_deleted', 'school_deleted');
        }

    }
}
