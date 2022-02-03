<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\ResetPasswordRequest;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Auth\Events\PasswordReset;
// use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Hash;
use App\Models\Auth\User;
use App\Models\Auth\PasswordHistory;
use Auth;
use DB;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller
{
    // use ResetsPasswords;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * ChangePasswordController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param string|null $token
     *
     * @return \Illuminate\Http\Response
     */
    public function showResetForm($email)
    {
        $user = User::where('email', $email)->first();

        return view('frontend.auth.passwords.reset', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password'
        ],
        [
            'password.min' => 'The password must be at least 6 characters',
            'password.max' => 'The password must be maximum 100 characters',
            'confirm_password.same' => 'Passwords do not match'
        ]
    );

        $user = DB::table('users') ->where('id', request('hidden_id'))->update(
            [
                'password'=> bcrypt($request->password)
            ]
        );

        return back()->with('success', 'success');

    }

}
