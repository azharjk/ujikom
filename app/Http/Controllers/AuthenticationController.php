<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserStoreRequest;

class AuthenticationController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('auth.login');
    }

    public function loginUser(UserRequest $request) {
        $validated = $request->validated();
        $user = User::where('nik', $validated['nik'])->first();

        if (!$user || $user->fullname !== $validated['fullname']) {
            return redirect()->back()->withErrors(['message' => 'NIK atau Nama Lengkap tidak valid']);
        }

        Auth::login($user);

        return redirect()->route('page.home');
    }

    public function registerNewUser(UserStoreRequest $request) {
        $validated = $request->validated();

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('page.home');
    }
}
