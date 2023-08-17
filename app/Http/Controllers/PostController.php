<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    // public function __construct(){
        // Use middleware to protect our route
        // $this->middleware('auth');
    // }

    // When we use a Route Model Binding automatically the method of this url wait a object od this class as a parameter
    public function index(User $user){

        if (!auth()->user()) {
            return redirect()->route('login');
        };
        // auth()->user() check if the user is authenticated
        // dd(auth()->user());

        // view fn receive a view as first param and a data as second
        return view('dashboard', [
            'user' => $user
        ]);
    }


    public function create()
    {
        if (!auth()->user()) {
            return redirect()->route('login');
        };
        return view('posts.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            "title" => 'required|max:255',
            "description" => 'required',
            "image" => 'required'
        ]);
    }
}
