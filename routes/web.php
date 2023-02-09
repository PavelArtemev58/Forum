<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('ifguest')->group(function(){
    Route::get('/', [MainController::class, 'showHome'])->name('home');
    Route::post('/deletepost/{id}', [PostController::class, 'deletePost']);
    Route::post('/changepost/{id}', [PostController::class, 'changePost']);
    Route::post('/deletetheme/{id}', [ThemeController::class, 'deleteTheme']);
    Route::post('/changetheme/{id}', [ThemeController::class, 'changeTheme']);
    Route::get('/section/{section}/{theme}', [PostController::class, 'showPosts'])->name('posts');
    Route::get('/section/{section}', [ThemeController::class, 'showThemes'])->name('themes');
    Route::post('/addtheme/{section}', [ThemeController::class, 'storeTheme']);
    Route::post('/addpost/{theme}', [PostController::class, 'storePost']);
    Route::get('/user/{id}', [UserController::class, 'showProfile'])->name('profile');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('guest')->middleware('ifuser')->group(function(){
    Route::get('/', [MainController::class, 'showHomeGuest'])->name('homeGuest');
    Route::get('/section/{section}/{theme}', [PostController::class, 'showPostsGuest'])->name('postsGuest');
    Route::get('/section/{section}', [ThemeController::class, 'showThemesGuest'])->name('themesGuest');
});

require __DIR__.'/auth.php';
