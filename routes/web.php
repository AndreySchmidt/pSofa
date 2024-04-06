<?php

// use App\Http\Controllers\Blog\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'], function (){
    Route::get('/', \IndexController::class)->name('blog.index');
    Route::get('/create', \CreateController::class, 'create')->name('blog.create');
    Route::get('/{blog}', \ShowController::class, 'show')->name('blog.show');
    Route::get('/{blog}/edit', \EditController::class, 'edit')->name('blog.edit');
    Route::patch('/{blog}', \UpdateController::class, 'update')->name('blog.update');
    Route::delete('/{blog}', \DeleteController::class, 'delete')->name('blog.delete');
    Route::post('/', \StoreController::class, 'store')->name('blog.store');
});


// Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
//     Route::get('/', \IndexController::class)->name('post.index');
//     Route::get('/{post}', \ShowController::class)->name('post.show');
//     // я добавил в форму коментария <input type = "hidden" name = "post_id" value = "{{ $post->id }}" />
//     // но чтобы не заморачиваться с ним (он не нужен), делаю нестид роутс для комментов и буду брать айди поста, который коментируют из урла
//     Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
//         Route::post('/', \StoreController::class)->name('post.comment.store');
//     });
//     Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
//         Route::post('/', \StoreController::class)->name('post.like.store');
//     });
// });

    // // Post
    // Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
    //     Route::get('/', \IndexController::class)->name('admin.post.index');
    //     Route::get('/create', \CreateController::class)->name('admin.post.create');
    //     Route::post('/', \StoreController::class)->name('admin.post.store');
    //     Route::get('/{post}', \ShowController::class)->name('admin.post.show');
    //     Route::get('/{post}/edit', \EditController::class)->name('admin.post.edit');
    //     Route::patch('/{post}', \UpdateController::class)->name('admin.post.update');
    //     Route::delete('/{post}', \DeleteController::class)->name('admin.post.delete');
    // });