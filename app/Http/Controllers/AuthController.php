<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request): RedirectResponse
    {
        $valid = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (Auth::guard('web')->attempt($valid)) {
            return to_route('home');
        }
        return back()->withErrors(['password' => 'Wrong email or password']);
    }
}
