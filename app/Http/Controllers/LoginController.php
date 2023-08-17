<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()) {
            return redirect()->route('posts.index', auth()->user()->username);
        };
        
        return view('auth.login');
    }

    // Validate fields
    public function store(Request $request)
    {
        $this->validate($request, [
            "email" => 'required|email',
            'password' => 'required',
        ]);

        // // Check if the attemp of auth is not true
        // if(!auth()->attempt($request->only('email', 'password'))){
        //     // If the auth is not true come back with a session to the login page and show the message to the user
        //     return back()->with('message', 'Credenciales no validas');
        // }


        // Check if the attemp of auth is not true
        // To keeap alive a session you can use the second param remember in attempt fn 
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            // If the auth is not true come back with a session to the login page and show the message to the user
            return back()->with('message', 'Credenciales no validas');
        }

        // As second parameter we can send a parameters array[]
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
