<?php

namespace App\Http\Controllers\frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Events\AddingTeam;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{

    CONST DRIVER_TYPE = 'facebook';

    public function handleFacebookRedirect()
    {
        return Socialite::driver(static::DRIVER_TYPE)->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            
            $user = Socialite::driver(static::DRIVER_TYPE)->user();
            // dd($user->id);

            $userExisted = User::where('oauth_id', $user->id)->where('oauth_type', static::DRIVER_TYPE)->first();

            // dd($userExisted);


            if( $userExisted ) {
                
                Auth::login($userExisted);

                return redirect()->route('frontend.index');

            }else {
                
                $newUser = User::create([
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => static::DRIVER_TYPE,
                    'password' => Hash::make($user->id)
                ]);

                // AddingTeam::dispatch($newUser);

                // $newUser->switchTeam($team = $newUser->ownedTeams()->create([
                //     'name' => $newUser->name . "'s Team",
                //     'personal_team' => false
                // ]));

                // $newUser->update([
                //   login  'current_team_id' => $newUser->id
                // ]);

                Auth::login($newUser);

                return redirect()->route('frontend.index');
            }


        } catch (Exception $e) {
            dd($e);
        }

    }
}