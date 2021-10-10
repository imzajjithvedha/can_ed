<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserLoggedIn;
use App\Exceptions\GeneralException;
use App\Helpers\Auth\SocialiteHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class SocialLoginController.
 */
class SocialLoginController extends Controller
{
     // Facebook login
     public function redirectToFacebook()
     {
         return Socialite::driver('facebook')->redirect();
     }
 
     // Facebook callback
     public function handleFacebookCallback()
     {
         $user = Socialite::driver('facebook')->user();
 
         $this->_registerOrLoginUser($user);
 
         // Return home after login
         return redirect()->route('home');
     }
 
     protected function _registerOrLoginUser($data)
     {
         $user = User::where('email', '=', $data->email)->first();
         if (!$user) {
             $user = new User();
             $user->name = $data->name;
             $user->email = $data->email;
             $user->provider_id = $data->id;
             $user->avatar = $data->avatar;
             $user->save();
         }
 
         Auth::login($user);
     }
}
