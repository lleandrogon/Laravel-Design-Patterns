<?php

use App\Http\Controllers\GreetingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SingletonController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('todos', TodoController::class);
Route::resource('users', UserController::class);
Route::post('users/register', [UserController::class, 'registerUser'])->name('user.register');

Route::get('singleton', [SingletonController::class, 'singletonExample']);

Route::get('greeting/{role}', [GreetingController::class, 'showGreetings']);

Route::controller(PostController::class)->group(function () {
    Route::get('create-post', 'index')->name('post.create');
    Route::post('store', 'store')->name('post.store');
});

// Route::get('create-post', [PostController::class, 'index']);
