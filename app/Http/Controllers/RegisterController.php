<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(RegisterFormRequest $request) : RedirectResponse
    {

        $valid = $request->validated();

        $user = User::create([
            'name' => $valid['name'],
            'email' => $valid['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($valid['password']),
            'remember_token' => Str::random(10),
        ]);

        if ($user) {
            Auth::guard('web')->login($user);
            return to_route('home');
        }
        return back()->withErrors(['password' => 'Something went wrong, try again']);
    }
}
