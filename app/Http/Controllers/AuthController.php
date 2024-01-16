<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(LoginFormRequest $request): RedirectResponse
    {
        $valid = $request->validated();

        if (Auth::guard('web')->attempt($valid)) {
            return to_route('home');
        }
        return back()->withErrors(['password' => 'Wrong email or password']);
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->regenerate();

        return to_route('home');
    }
}
