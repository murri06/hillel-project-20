<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{

    public function list(): View
    {
        return view('users.list', [
            'users' => User::all()
        ]);
    }

    public function details($id): View
    {
        $user = User::query()->findOrFail($id);
        return view('users.details', [
            'user' => $user,
            'events' => $user->events,
        ]);
    }

    public function addUser(Request $request): RedirectResponse
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
        $user->save();
        return to_route('users_list');
    }

    public function editUserForm($id): View
    {
        return view('users.create', [
            'user' => User::query()->findOrFail($id),
        ]);
    }

    public function editUser($id, Request $request): RedirectResponse
    {
        $user = User::query()->findOrFail($id);
        $valid = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['required', 'min:6'],
        ]);
        $user->update([
            'name' => $valid['name'],
            'email' => $valid['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($valid['password']),
        ]);
        return to_route('users_list');
    }

    public function deleteUser($id): RedirectResponse
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        return to_route('users_list');
    }
}
