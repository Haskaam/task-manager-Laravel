<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function store(Request $request) {
        $request->validate([
            'user' => 'required|min:3|max:50|',
            'password' => 'required|min:3',
            'repeated_password' => 'required|same:password'
        ]);


        User::create([
            'username' => $request->user,
            'password' => Hash::make($request->password),
        ]);

        return view('/register_success');
    }

    public function verify(Request $request) {
        $dane = $request->validate([
            'user' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt([
            'username' => $dane['user'],
            'password' => $dane['password'],
        ])) {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }
        return back()->withErrors([
            'user' => 'Nieprawidłowa nazwa użytkownika lub hasło.'
        ])->onlyInput('user');

    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
