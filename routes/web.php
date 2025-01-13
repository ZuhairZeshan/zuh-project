<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

//fetching data all
Route::get('/posts', [PostsController::class, 'index'])->name('posts');
//fetching data of particular id
Route::get('/posts/{id}', [PostsController::class, 'show']);

//showing form
Route::get('/form', [PostsController::class, 'create']);
//sending data to database
Route::post('/form', [PostsController::class, 'store'])->name('form.store');

//show edit form
Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
//edit data to database
Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');

//delete from database
Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

