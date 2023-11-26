<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/' ,function(){
return view ('welcome');
});

Route::get('dashboard', [PostController::class ,'dashboard'])->middleware('auth')->name('dashboard');
Route::get('posts/index' ,[PostController::class ,'index'])->name('posts.index');
Route::get('posts/create' ,[PostController::class ,'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::any('posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::any('posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');
Route::any('post/link/{id}' ,[PostController::class ,'link'])->name('post.link');

////////////////////////////////////////////////////





Route::resource('comments' ,CommentController::class ,[
    'names'=>[
      'index'=>'comments.index',
      'create'=>'comments.create',
       'store'=>'comments.store'
]]);

Route::resource('categories' ,CategoryController::class ,[
    'names'=>[
      'index'=>'categories.index',
       'store'=>'categories.store',

]]);

Route::put('categories/update', [CategoryController::class, 'update'])->name('categories.update');
Route::any('categories/delete' ,[CategoryController::class ,'destroy'])->name('categories.delete');
Route::put('comments/update', [CommentController::class, 'update'])->name('comments.update');
Route::any('comments/delete' ,[CommentController::class ,'destroy'])->name('comments.delete');
Route::resource('tags' ,TagController::class ,[
    'names'=>[
      'index'=>'tags.index',


]]);

Route::middleware('auth')->group(function () {


    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});

Route::post('media/store' ,[MediaController::class ,'store'])->name('media.store');
Route::get('media/index' ,[MediaController::class ,'index'])->name('media.index');
Route::any('media/delete/{id}' ,[MediaController::class ,'destroy'])->name('media.delete');



Route::get('/home', [HomeController::class ,'index'])->name('home');

Route::get('/{page}', [AdminController::class ,'index']);






