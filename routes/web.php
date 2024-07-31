<?php

use App\Livewire\Post\CreatePost;
use App\Livewire\Post\Posts;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('posts', Posts::class)->name('posts');
    Route::get('posts/create', CreatePost::class)->name('create-post');
    Route::get('/posts/edit/{post_id}', CreatePost::class)->name('posts.edit');
});
require __DIR__ . '/auth.php';
