<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'homepage']);

Route::get('/my-posts', [HomeController::class, 'myposts'])->middleware('auth');

Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'register']); 

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [UserController::class, 'login']); 
Route::post('/logout', [UserController::class, 'logout']);

Route::post('/create-post', [PostController::class, 'createPost'])->middleware('auth');
Route::get('/edit-post/{post}', [PostController::class, 'showEditPost'])->middleware('auth');
Route::put('/edit-post/{post}', [PostController::class, 'editPost'])->middleware('auth');
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])->middleware('auth');
