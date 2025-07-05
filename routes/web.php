<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WpPostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
 Route::get('/get-wp-post-data', [WpPostController::class, 'store']);
 Route::get('/wp-post-list', [WpPostController::class, 'listing'])->name('wp-posts.index');
 Route::get('/edit-post/{id}', [WpPostController::class, 'edit']);
 Route::post('/update-post/{id}', [WpPostController::class, 'update_post'])->name('update.post');
 Route::get('/wp-posts/create', [WPPostController::class, 'create'])->name('wp-posts.create');
 Route::post('/wp-posts', [WPPostController::class, 'add_new'])->name('wp-posts.store');
 Route::DELETE('/delete-post/{id}', [WpPostController::class, 'delete']);

