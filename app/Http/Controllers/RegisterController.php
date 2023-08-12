<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
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


        // Modify the request
        $request->request->add([
            'username' => Str::slug($request->username)
        ]);


        // Validation
        // Do validate of the information received
        // validate($request, rules)
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:25',
            'email' => 'required|unique:users|email',
            // Confirmed rule check if the password_confirmation field match with password
            // this rule only work when the password confirmed field have the name password_confirmation
            'password' => 'required|confirmed',

        ]);

        User::create([
            'name' => $request->name,
            // Str::lower Transform text to lowercase
            // Str::slug transform the text to a url
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }
}
