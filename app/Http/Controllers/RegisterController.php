<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register( Request $request)
    {

        $valid = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => ['required', 'min:6'],
        ]);

        $user = User::create([
            'name' => $valid['name'],
            'email' => $valid['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($valid['password']),
            'remember_token' => Str::random(10),
        ]);
        dd($request);
    }
}
