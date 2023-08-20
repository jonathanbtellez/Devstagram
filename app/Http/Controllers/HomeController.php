<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    } 
    // This methos is use when we only use in the controller a method 
    public function __invoke()
    {   
        // 1. Get the user
        // 2. get the followings user
        // 3. Pluck method extract the columns that we need
        // 4. tranform the result in an array
        $ids = auth()->user()->followings->pluck('id')->toArray();
        
        // The method where iterate with a value 
        // WhereIn iterate with and array an return an array with the info

        //latest order the result by date of created 
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('index', [
            'posts' => $posts
        ]);
    }
}
