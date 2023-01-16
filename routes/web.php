<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'postDatas'])->name('home.postDatas');

Route::get('/comments/list', [App\Http\Controllers\CommentsController::class, 'getComments'])->name('comments.getComments');
Route::post('/comments/list', [App\Http\Controllers\CommentsController::class, 'getFiltredComments'])->name('comments.getFiltredComments');

Route::get('/mentions', [App\Http\Controllers\MentionsController::class, 'index'])->name('mentions.index');

Route::get('/', function () {
    return redirect(route('home.index'));
});

Route::get('/storage', function () {
    Artisan::call('storage:link');
});