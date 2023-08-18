<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register user form
    public function create() {
        return view('users.register');
    }

    // store user
    public function store(Request $request) {
        $datas = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // hash password
        $datas['password'] = bcrypt($datas['password']);

        // store user data
        $user = User::create($datas);

        // login user
        auth()->login($user);

        return redirect()
            ->route('home')
            ->with('message', 'User created and logged in!');
    }

    // logout user
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('message', 'You have been logged out!');
    }

    // show login form
    public function login() {
        return view('users.login');
    }

    // authenticate user
    public function authenticate(Request $request) {
        $datas = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($datas)) {
            $request->session()->regenerate();

            return redirect()
                ->route('home')
                ->with('message', 'You are now logged in!');
        }

        return back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->onlyInput('email');
    }
}
