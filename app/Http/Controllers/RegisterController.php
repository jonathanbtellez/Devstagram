<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    // Resource controller is called the conventions to name controllers methods

    //
    /**
     * To convention the method index must return a view
     */
    public function index()
    {
        return view('auth.register');
    }
    // IN controllers we can use a Request that containt the info about the http to be use later
    public function store(Request $request)
    {
        // dd($request);

        // Using get method we can obtain the info related to the name attribute in html pass as parameter
        // dd($request->get('name'));

        // Validation
        // Do validate of the information received
        // validate($request, rules)

        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:25',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);
    }
}
