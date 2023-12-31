<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// ------------------------------HOME---------------------------------
// When we use a controller with an invoke method we don't neen pass the array with [controller, method] you only need the controller
Route::get('/', HomeController::class)->name('home');

// -------------------------Register ------------------->
// [Controller::class, 'Method to call the view']
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// [Controller::class, 'Method to store data']
// [RegisterController::class, 'store']
Route::post('/register', [RegisterController::class, 'store']);

// ----------------------------Login -----------------------------------
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// --------------------------------logout----------------------
// Name is a function that sabe the name of the endpoint to be use after and if we need chande the endpoint we have issues
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// -------------------------------- PROFILE --------------------------------------------
Route::get('/edit-profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/edit-profile', [ProfileController::class, 'store'])->name('profile.store');

// --------------------------POSTS-------------------------------------------------
// When we use {} in the path we are creating a dinamic urls
// When we use between the {} a name of a model ex. {user} we are using route model binding

// Route::get('/{user}', [PostController::class, 'index'])->name('posts.index');

// we can use a attr of a model binded after two points /{user:username}
//The first route is an example that how you can use an attr in the uri
//* the use of variable have priority in the routes is important leave this how last gets routes
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');

// Come back to the laravel conventions
// view to create a register
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

//Post data to create a register
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Show a register
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Delete a register
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');




// -------------------------------- IMAGE ---------------------------------------
Route::post('/images', [ImageController::class, 'store'])->name('images.store');



// ------------------------- COMMENTS ---------------------------------------------
Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comments.store');


//----------------------------- LIKE --------------------------------------------
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');


//  --------------------------- FOLLOWING --------------------------------------------
Route::post('/{user:username}/follow', [FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class,'destroy'])->name('users.unfollow');
