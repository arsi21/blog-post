<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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

// Posts Routes
// all posts
Route::get('/', [PostController::class, 'index'])->name('home');

// show create post form
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');

// store post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');

// show edit post form
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');

// update post
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');

// delete post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

// manage post
Route::get('/posts/manage', [PostController::class, 'manage'])->name('posts.manage')->middleware('auth');

// single post
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


// User Routes
// show registration form
Route::get('/register', [UserController::class, 'create'])->name('users.create')->middleware('guest');

// store user
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// logout user
Route::post('/logout', [UserController::class, 'logout'])->name('users.logout')->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// authenticate user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('users.authenticate');


// Comment Routes
// store comment
Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');