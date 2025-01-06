<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [PagesController::class, 'index']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('/contacts', [PagesController::class, 'contacts']);


// Route::get('/about', function () {
//     return view('pages.about');
// });

// Route::get('/users/{id}', function ($id) {
//     return 'This is a User ' . $id;
// });



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');

Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::get('/posts/{id}', [PostsController::class, 'show']);
