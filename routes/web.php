<?php

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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    } else {
        return view('welcome');
    }
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/create', 'PostsController@create');
Route::get('/posts/create', [App\Http\Controllers\PostsController::class, 'create'])->name('createpost');

Route::post('/posts', [App\Http\Controllers\PostsController::class, 'store'])->name('storepost');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');

Route::post('/profile/save', [App\Http\Controllers\ProfileController::class, 'save'])->name('profile.save');