<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});
Route::get('/blogs', function () {
   
    return view('blogs', ['title' => 'blog','posts'=>Post::filter(request(['search','category','author']))->latest()->paginate(9)->withQueryString()]);
});
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
   
    return view('blogs', ['title'=> 'Ctegory : '.$post->name,'posts' => $post->blogsCategory]);
});
