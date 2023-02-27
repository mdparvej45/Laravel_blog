<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    //Google login method
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    //Google redirect method
    public function googleRedirect()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();


            $user = User::updateOrCreate(
                [
                    'email' => $googleUser->email,
                ],
                [
                    'name' => $googleUser->user['given_name'],
                    'last_name' => $googleUser->user['family_name'],
                    'email' => $googleUser->email,
                    'password' => Hash::make(Str::random(8)),
                ]
            );
            $user->assignRole('user');
            Auth::login($user);
            if(Auth::user()->getRoleNames() == 'admin'){
                return redirect()->route('deshboard');
            }elseif(Auth::user()->getRoleNames() == 'moderator'){
                return redirect()->route('deshboard');
            }elseif(Auth::user()->getRoleNames() == 'editor'){
                return redirect()->route('deshboard');
            }elseif(Auth::user()->getRoleNames() == 'writer'){
                return redirect()->route('deshboard');
            }else{
                return redirect()->route('frontend.index');
            }
    }


    
    //Facebook login method
    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }
    //Facebook Redirect method
    public function facebookRedirect()
    {
        $facebookUser = Socialite::driver('facebook')->stateless()->user();
        $user = User::updateOrCreate(
            [
                'email' => $facebookUser->id
            ],
            [
                'name' => $facebookUser->name,
                'last_name' => $facebookUser->name,
                'email' => $facebookUser->id,
                'password' => Hash::make(Str::random(8)),
            ]
        );
        $user->assignRole('user');
        Auth::login($user);
        if(Auth::user()->getRoleNames() == 'admin'){
            return redirect()->route('deshboard');
        }elseif(Auth::user()->getRoleNames() == 'moderator'){
            return redirect()->route('deshboard');
        }elseif(Auth::user()->getRoleNames() == 'editor'){
            return redirect()->route('deshboard');
        }elseif(Auth::user()->getRoleNames() == 'writer'){
            return redirect()->route('deshboard');
        }else{
            return redirect()->route('frontend.index');
        }
    }


    //Github login method
    public function githubLogin()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }
    // Github redirect method
    public function githubRedirect()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();
        $user = User::updateOrCreate(
            [
                'email' => $githubUser->email
            ],
            [
                'name' => $githubUser->name,
                'last_name' => $githubUser->name,
                'email' => $githubUser->email,
                'password' => Hash::make(Str::random(8)),
            ]    
        );
        Auth::login($user);
        $user->assignRole('user');
        if(Auth::user()->getRoleNames() == 'admin'){
            return redirect()->route('deshboard');
        }elseif(Auth::user()->getRoleNames() == 'moderator'){
            return redirect()->route('deshboard');
        }elseif(Auth::user()->getRoleNames() == 'editor'){
            return redirect()->route('deshboard');
        }elseif(Auth::user()->getRoleNames() == 'writer'){
            return redirect()->route('deshboard');
        }else{
            return redirect()->route('frontend.index');
        }
    }
}
