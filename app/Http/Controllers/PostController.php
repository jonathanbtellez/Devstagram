<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct(){
        // Use middleware to protect our route
        $this->middleware('auth');
    }

    public function index(){
        // auth()->user() check if the user is authenticated
        // dd(auth()->user());

        return view('dashboard');
    }
}
