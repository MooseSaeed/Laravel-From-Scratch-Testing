<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\sessionsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('home');

route::get('posts/{post:slug}', [PostController::class, 'show']);
route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

route::post('newsletter', NewsLetterController::class);

route::get('register', [RegisterController::class, 'create'])->middleware('guest');
route::post('register', [RegisterController::class, 'store'])->middleware('guest');

route::get('/login', [sessionsController::class, 'create'])->middleware('guest');
route::post('/sessions', [sessionsController::class, 'store'])->middleware('guest');

route::post('logout', [sessionsController::class, 'destroy'])->middleware('auth');

route::middleware('can:admin')->group(function () {
    route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('can:admin');
    route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');
    route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admin');
    route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('can:admin');
    route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('can:admin');
    route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('can:admin');
});