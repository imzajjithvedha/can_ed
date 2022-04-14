<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\Auth\User;
use App\Models\Auth\PasswordHistory;
use Auth;
use DB;
use Carbon\Carbon;
use App\Mail\Frontend\PasswordUpdate;
use App\Mail\Frontend\AccountClose;
use Illuminate\Support\Facades\Mail;

/**
 * Class UserProfileController.
 */
class UserProfileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userPassword()
    {
        return view('frontend.user.user_password');
    }

    

    public function userUpdatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|string|min:8|max:100|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'confirm_password' => 'required|same:new_password'
        ]);

        $user = auth()->user();

        if(Hash::check($request->old_password, $user->password)) {

            $user->update([
                'password'=> bcrypt($request->new_password),
                'updated_at' => Carbon::now(),
            ]);

            $details = [
                'name' => auth()->user()->name
            ];

            Mail::to([auth()->user()->email])->send(new PasswordUpdate($details));

            return back()->with('success', 'success');

        } else {

            return back()->with('error', 'error');
        }

    }




    public function userAccount()
    {
        return view('frontend.user.user_account');
    }


    public function userAccountClose(Request $request)
    {
        $user_id = auth()->user()->id;

        // $user = DB::table('users') ->where('id', $user_id)->delete();

        $user = DB::table('users') ->where('id', $user_id)->update(
            [
                'active' => 0
            ]
        );
        
        $details = [
            'name' => auth()->user()->name
        ];

        Mail::to([auth()->user()->email])->send(new AccountClose($details));

        Auth::logout();

        return redirect()->route('frontend.auth.login');

    }
}
