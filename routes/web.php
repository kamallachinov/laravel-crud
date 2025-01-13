<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;


Route::get('/', function () {

    //gets all posts and passes to home.blade.php file as params
    // $posts =  Post::all();
    // return view('home', ['posts' => $posts]);


    //gets specific posts and passes to home.blade.php file as params
    // $posts =  Post::where('user_id', Auth::id())->get();
    // return view('home', ['posts' => $posts]);

    //gets specific posts with the use instance of user model and passes to home.blade.php file as params
    $posts = [];
    if (Auth::user()) {
        $posts = auth()->user()->usersPosts()->get();
    }
    return view('home', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);


//Blog post related routes
Route::post('/create-post', [PostController::class, 'createPost']);
