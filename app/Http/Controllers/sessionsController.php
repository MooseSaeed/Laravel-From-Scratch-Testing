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

        if (!auth()->attempt($attributes)) {

            throw ValidationException::withMessages([
                'email' => 'Your provided credentials bla bla'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
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