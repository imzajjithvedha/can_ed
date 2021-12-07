<?php

namespace App\Http\Controllers\Frontend\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use Mail;
use App\Mail\Frontend\ForgotMail;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * Class ForgotPasswordController.
 */
class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('frontend.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user == null) {
            return redirect()->back()->with('error', 'error');
        }

        $details = [
            'name' => $user->name,
            'email' => $request->email
        ];

        Mail::to([$request->email])->send(new ForgotMail($details));

        return redirect()->back()->with('success', 'success');
    }
}
