<?php

use App\Http\Controllers\DashboardController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

 

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});
Route::get('/blogs', function () {
   
    return view('blogs', ['title' => 'blog','posts'=>Post::filter(request(['search','category','author']))->latest()->paginate(9)->withQueryString()]);
})->middleware('auth');
Route::get('/contac', function () {
    return view('contac', ['title' => 'contac']);
});

Route::get('/blog/{post:slug}', action: function (Post $post) {

    return view('blog', ['title' => 'Read more', 'post' => $post]);
});

Route::get('/author/{user:username}', function (User $user) {
    return view('blogs', ['title'=> count($user->posts).' Article By '. $user->name,'posts' => $user->posts]);
});

Route::get('/category/{post:slug}', function (Category $post) {
   
    return view('blogs', ['title'=> 'Category : '.$post->name,'posts' => $post->blogsCategory]);
});

//login
Route::get('/login', [LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/login' , [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

// register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);
//dashboard
Route::get('/dashboard', [DashboardController::class,'index']);
