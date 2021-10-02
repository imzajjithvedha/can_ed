<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;
use Reminder;
use App\Models\Auth\User;

/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController extends Controller
{

    public function forgotPassword()
    {
        return view('frontend.auth.passwords.email');
    }

    public function passwordEmail(Request $request) {
        $user = User::whereEmail($request->email)->first();

        if($user == null ){
            return redirect()->back()->with('error', 'error');
        }

        $user = Sentinel::findById($user->id);
        $reminder = Reminder::exists($user) ? : Reminder::create($user);
        $this->sendEmail($user, $reminder->code);

        return redirect()->back()->with(['success' => 'Reset code sent successfully']);
    }

    public function sendEmail($user, $code) {
        Mail::send(
            'mail.forgot',
            ['user' => $user, 'code' => $code],
            function($message) use ($user) {
                $message->to($user->email);
                $message->subject("$user->name, reset your password");
            }
        );
    }
}
