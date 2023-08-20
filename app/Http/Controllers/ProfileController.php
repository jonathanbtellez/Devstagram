<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(User $user){
        
        return view('profile.index');
    }


    public function store(Request $request){

        $request->request->add([
            'username' => Str::slug($request->username)
        ]);
        
        // not_in create a black list of values to take
        // in force the user to choice this value
        // Check if I am the user with the value unique  
        // 'unique:users,username,'.auth()->user()->id
        $this->validate($request, [
            'username' => ['required','unique:users,username,'.auth()->user()->id,'min:3','max:25','not_in:edit-profile'],
        ]);

        if($request->image){
            $image =  $request->file('image');

            // Create a unique name to a image
            $nameImage = Str::uuid().".".$image->extension();
    
            // When we use the Image class we use intervention library and create a instance of this library
            $imageServer = Image::make($image);
    
            // Make the image squared using intervention methods
            $imageServer->fit(1000,1000);
    
            // Create a space in the public folder to save the image
            $imagePath = public_path('profiles')."/".$nameImage;
    
            // Give the order to intervention to save the image in this path
            $imageServer->save($imagePath);
        }


        $usuario =  User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->image = $nameImage ?? "";
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
}
