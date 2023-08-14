<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('index');
});

// [Controller::class, 'Method to call the view']
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// [Controller::class, 'Method to store data']
// [RegisterController::class, 'store']
Route::post('/register', [RegisterController::class, 'store']);

// Login 
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// Name is a function that sabe the name of the endpoint to be use after and if we need chande the endpoint we have issues
// When we use {} in the path we are creating a dinamic urls
// When we use between the {} a name of a model ex. {user} we are using route model binding

Route::get('/{user}', [PostController::class, 'index'])->name('posts.index');

