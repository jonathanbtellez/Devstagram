<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function __construct(){
        // Use middleware to protect our route
        $this->middleware('auth');
    }

    // When we use a Route Model Binding automatically the method of this url wait a object od this class as a parameter
    public function index(User $user){
        // auth()->user() check if the user is authenticated
        // dd(auth()->user());

        return view('dashboard');
    }
}
