<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    public function store(){
        // Close user session using auth helper
        auth()->logout();
        return redirect()->route('login');
    }
}
