<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginUser()
    {
        return view('auth.login');
    }

    public function registerUser()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|exists:users,email',
            'password' => 'required'
        ]);

        $credintials = $request->only('email', 'password');

        if (Auth::attempt($credintials)) {
            return redirect()->route('home')->withSuccess("Signed in...");
        }

        return redirect()->route('login-view')->withError('Login creaditials are invalid...');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'                  => 'required|alpha|max:30',
            'email'                 => 'required|email|max:40|unique:users',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function home()
    {
        if (Auth::check()) {
            return view('home');
        }
        return redirect()->route('login-view')->withError('You are not allowed to access');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login-view')->withSuccess('Logged Out Sucessfully');
    }
}
