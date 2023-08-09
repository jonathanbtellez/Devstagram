<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    /**
     * To convention the method index must return a view
     */
    public function index()
    {
        return view('auth.register');
    }

    public function store()
    {   
        dd('post....');
    }
}

