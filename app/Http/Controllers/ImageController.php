<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ImageController extends Controller
{
    //
    public function store(Request $request){

        // Get the info of all request 
        // $image =  $request->all();
        // return response()->json($image);



        //Save the request file with name file in a varible 
        $image =  $request->file('file');

        // Create a unique name to a image
        $nameImage = Str::uuid().".".$image->extension();

        // When we use the Image class we use intervention library and create a instance of this library
        $imageServer = Image::make($image);

        // Make the image squared using intervention methods
        $imageServer->fit(1000,1000);

        // Create a space in the public folder to save the image
        $imagePath = public_path('uploads')."/".$nameImage;

        // Give the order to intervention to save the image in this path
        $imageServer->save($imagePath);

        
        // If the file was charged sucessfull the response going to be the return
        // 1. Create a response 
        // 2. parse the information to json format to be manage
        // 3. the use a asociative array to send info and add a extension to  the file
        return response()->json(['image' => $nameImage]);
    }
}
