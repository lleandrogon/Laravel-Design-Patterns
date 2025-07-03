<?php

use App\Http\Controllers\SingletonController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('todos', TodoController::class);
Route::resource('users', UserController::class);

Route::get('singleton', [SingletonController::class, 'singletonExample']);
