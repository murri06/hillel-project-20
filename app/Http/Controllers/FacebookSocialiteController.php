<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookSocialiteController extends Controller
{
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $findUser = User::where('social_id', $user->id)->first();

            if ($findUser) {

                Auth::login($findUser);

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'facebook',
                    'password' => encrypt('my-facebook')
                ]);

                Auth::login($newUser);

            }
            return redirect('/home');

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
