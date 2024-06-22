<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/welcome', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/',[PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts/create',[PostController::class, 'create'])
    ->name('posts.create');


Route::get('/posts/{post}',[PostController::class, 'show'])
    ->name('posts.show');


Route::post('/posts',[PostController::class, 'store'])
    ->name('posts.store');

Route::get('/posts/{post}/edit',[PostController::class, 'edit'])
    ->name('posts.edit');

Route::patch('/posts/{post}',[PostController::class, 'update'])
    ->name('posts.update');

Route::delete('/posts/{post}',[PostController::class, 'delete'])
    ->name('posts.delete');

require __DIR__.'/auth.php';

require __DIR__.'/auth.php';
