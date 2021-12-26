<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
route::get('posts/{post:slug}', [PostController::class, 'show']);

route::get('register', [RegisterController::class, 'create']);
