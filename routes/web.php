<?php

// use App\Http\Controllers\Blog\IndexController;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
// use Laravel\Sanctum\PersonalAccessToken;

Route::get('/', function () {
    return view('welcome');
});

// Blog
Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'], function () {
    Route::get('/', \IndexController::class)->name('blog.index');
    // Route::post('/search', \IndexController::class)->name('blog.search');
    Route::get('/create', \CreateController::class)->name('blog.create');
    Route::post('/', \StoreController::class)->name('blog.store');
    Route::get('/{blog}', \ShowController::class)->name('blog.show');
    Route::get('/{blog}/edit', \EditController::class)->name('blog.edit');
    Route::patch('/{blog}', \UpdateController::class)->name('blog.update');
    Route::delete('/{blog}', \DeleteController::class)->name('blog.delete');
});

// Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'], function (){
//     Route::get('/', \IndexController::class)->name('blog.index');
//     Route::get('/create', \CreateController::class, 'create')->name('blog.create');
//     Route::get('/{blog}', \ShowController::class, 'show')->name('blog.show');
//     Route::get('/{blog}/edit', \EditController::class, 'edit')->name('blog.edit');
//     Route::patch('/{blog}', \UpdateController::class, 'update')->name('blog.update');
//     // Route::delete('/{blog}', \DeleteController::class, 'delete')->name('blog.delete')->middleware('auth:sanctum');
//     Route::delete('/{blog}', \DeleteController::class, 'delete')->name('blog.delete');
//     Route::post('/', \StoreController::class, 'store')->name('blog.store');
// });

// X-XSRF-TOKEN GET -> /sanctum/csrf-cookie
Route::post('/register', [App\Http\Controllers\Sanctum\RegisterUserController::class, 'store'])->middleware('guest');
Route::delete('/delete-account', [App\Http\Controllers\Sanctum\RegisterUserController::class, 'destroy'])->middleware('auth');

Route::post('/login', [App\Http\Controllers\Sanctum\LoginUserController::class, 'store'])->middleware('guest')->name('login');
Route::delete('/logout', [App\Http\Controllers\Sanctum\LoginUserController::class, 'destroy'])->middleware('auth');
// Route::delete('/logout', [App\Http\Controllers\Sanctum\LoginUserController::class, 'destroy'])->middleware('auth:sanctum');


// profile
Route::get('/profile', [App\Http\Controllers\Sanctum\ProfileController::class, 'show'])->middleware(['auth:sanctum', 'verified']);
Route::put('/profile', [App\Http\Controllers\Sanctum\ProfileController::class, 'update'])->middleware(['auth:sanctum', 'verified']);
Route::post('/email/verification-notification', [App\Http\Controllers\Sanctum\EmailVerificationNotificationController::class, 'store'])->middleware(['auth', 'signed', 'throttle:6,1']);
Route::get('/verify-email/{id}/{hash}', App\Http\Controllers\Sanctum\VerifyEmailController::class)->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');


Route::post('/forgot-password', [App\Http\Controllers\Sanctum\PasswordResetLinkController::class, 'store'])
    ->middleware(['guest']);
Route::post('/reset-password', [App\Http\Controllers\Sanctum\NewPasswordController::class, 'store'])
    ->middleware(['guest'])->name('password.reset');


// Route::group(['namespace' => 'App\Http\Controllers\Sanctum', 'prefix' => 'sanctum'], function (){
//     Route::post('/personl-access-tokens', [\PersonalAccessTokenController::class, 'store']);
//     Route::delete('/personl-access-tokens', [\PersonalAccessTokenController::class, 'destroy'])->middleware('auth:sanctum');
//     // Route::delete('/personl-access-tokens/{$token}', [\PersonalAccessTokenController::class, 'destroy'])->middleware('auth:sanctum');
// });

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

