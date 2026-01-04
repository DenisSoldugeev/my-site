<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
    });
});
