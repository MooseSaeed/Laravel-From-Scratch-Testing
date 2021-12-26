<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class sessionsController extends Controller
{

    public function store()
    {
        // validate the request

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // atttempt to authenticate and log the user in

        if (auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        //auth failed

        throw ValidationException::withMessages(['email' => 'Your provided credentials bla bla']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
