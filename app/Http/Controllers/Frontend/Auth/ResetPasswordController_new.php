<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\Auth\User;


/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /** 
     * 
     * 
     * @var string 
     */

     protected $redirectTo = RouteServiceProvider::HOME;
     protected function redirectTo(){
         if(Auth()->user()->role == 1) {
             return route('admin.dashboard');
         }
         elseif(Auth()->user()->role == 1) {
             return route('frontend.user.account_dashboard');
         }
     }
}
