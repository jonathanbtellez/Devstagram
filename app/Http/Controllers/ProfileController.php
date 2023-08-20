<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        return view('profile.index');
    }


    public function store(Request $request)
    {

        $request->request->add([
            'username' => Str::slug($request->username)
        ]);

        // Validation
        // not_in create a black list of values to take
        // in force the user to choice this value
        // Check if I am the user with the value unique  
        // 'unique:users,username,'.auth()->user()->id
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:25', 'not_in:edit-profile'],
            'email' => ['required', 'unique:users,email,' . auth()->user()->id, 'min:3'],
            'password' => 'required'
        ]);


        //  Attemp to confirm the changes
        if (!auth()->attempt(['email'=> auth()->user()->email,'password'=> $request->password])) {
            // If the auth is not true come back with a session to the login page and show the message to the user
            return back()->with('message', 'Contraseña incorrecta');
        }

        // fit image using interventory
        if ($request->image) {
            $image =  $request->file('image');

            // Create a unique name to a image
            $nameImage = Str::uuid() . "." . $image->extension();

            // When we use the Image class we use intervention library and create a instance of this library
            $imageServer = Image::make($image);

            // Make the image squared using intervention methods
            $imageServer->fit(1000, 1000);

            // Create a space in the public folder to save the image
            $imagePath = public_path('profiles') . "/" . $nameImage;

            // Give the order to intervention to save the image in this path
            $imageServer->save($imagePath);
        }

        // Saving data
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->image = $nameImage ?? auth()->user()->image ?? null;

        // Delete image
        if (!$usuario->image) {
            $image_path = public_path('profiles/' . auth()->user()->image);
            // Validate if the file exist using the path
            if (File::exists($image_path)) {
                // Use PHP funtion to delete file from directory
                unlink($image_path);
            }
        }

        // save newPassword with hash

        if($request->newPassword){
            if(Str::length($request->newPassword) < 6){
                return back()->with('failChangePassword', 'La nueva contraseña debe tener al menos 6 caracteres');
            }else{
                $usuario->password = $request->newPassword;
                // $usuario->password = Hash::make($request->newPassword);
            }
        }

        // save user
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
}
