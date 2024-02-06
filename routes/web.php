<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'], function (){
    Route::get('/', \IndexController::class)->name('blog.index');
//     Route::get('/create', \CreateController::class, 'create')->name('blog.create');
//     Route::get('/{blog}', \ShowController::class, 'show')->name('blog.show');
//     Route::get('/{blog}/edit', \EditController::class, 'edit')->name('blog.edit');
//     Route::patch('/{blog}', \UpdateController::class, 'update')->name('blog.update');
//     Route::delete('/{blog}', \DeleteController::class, 'delete')->name('blog.delete');
//     Route::blog('/', \StoreController::class, 'store')->name('blog.store');
});