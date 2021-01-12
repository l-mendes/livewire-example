<?php

use App\Http\Livewire\ShowTweets;
use App\Http\Livewire\User\UploadPhoto;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->get('tweets', ShowTweets::class)->name('tweets.index');
Route::middleware(['auth'])->get('/upload', UploadPhoto::class)->name('upload.photo.user');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
