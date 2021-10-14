<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\Auth\User;
use App\Models\Auth\PasswordHistory;
use Auth;

/**
 * Class UserProfileController.
 */
class UserProfileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settingsDashboard()
    {
        return view('frontend.user.user_settings');
    }

    

    public function settingsUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:6|max:100',
            'new_password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:new_password'
        ]);

        $user = auth()->user();

        if(Hash::check($request->old_password, $user->password)) {

            $user->update([
                'password'=> bcrypt($request->new_password)
            ]);

            return back()->with('success', 'success');

        } else {

            return back()->with('error', 'error');
        }

    }


    public function accountDelete(Request $request)
    {
        $user_id = auth()->user()->id;

        $history = PasswordHistory::where('user_id', $user_id)->delete();

        $user = User::where('id', $user_id)->delete();

        // return view('frontend.index')->with('account_deleted', 'account_deleted');
        return redirect()->route('frontend.auth.login');
    }
}
