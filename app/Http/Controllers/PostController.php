<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //
    public function __construct()
    {
        // Use middleware to protect our route
        // with except we can allow thw access to the method that you want
        $this->middleware('auth')->except(['show', 'index']);
    }

    // When we use a Route Model Binding automatically the method of this url wait a object od this class as a parameter
    public function index(User $user)
    {

        // auth()->user() check if the user is authenticated
        // dd(auth()->user());

        // Do a consult in our db
        // Params 1= field in our table
        // Param 2: dato that going to be equal
        // get method return the consult to the database
        // $posts  = Post::where('user_id', $user->id)->get();

        //latest order the result by date of created 
        // Paginate method allow show a specific quantity of register per view and a method to see the next  or previous registers
        $posts  = Post::where('user_id', $user->id)->latest()->paginate(8);

        // Filter by collection
        // This filter don´t have
        // $user->posts
        // $post only going to return the model
        // To see al result you need use get method
        // dd($post->get());

        // view fn receive a view as first param and a data as second
        // Al info sended in the second param will be avaible in our view
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        // if (!auth()->user()) {
        //     return redirect()->route('login');
        // };
        return view('posts.create');
    }

    // Storing a post register in pur database
    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => 'required|max:255',
            "description" => 'required',
            "image" => 'required'
        ]);

        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'image' => $request->image,
        //     'user_id' => auth()->user()->id
        // ]);

        // other way to store registers

        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->image = $request->image;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // Storing register using a ORM  relation model()->model relationated()
        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user()->id
        ]);


        return redirect(route('posts.index', auth()->user()->username));
    }

    // Pass the object that the url wait to do a model data binding
    // The order gice in the controller must be respected
    public function show(User $user, Post $post) 
    {
        return view('posts.show',
        [
            // Send data to be use in the view
            'user'=> $user,
            'post' => $post,
        ]);
    }

    public function destroy(Post $post){

        // Authoriza method cale a policy and implement the method give as a param
        $this->authorize('delete', $post);
        $post->delete();

        // Delete image
        $image_path = public_path('uploads/'.$post->image);

        // Validate if the file exist using the path
        if(File::exists($image_path)){

            // Use PHP funtion to delete file from directory
            unlink($image_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
