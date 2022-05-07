<?php

use App\Http\Controllers\Backend\PostsController;
use App\Models\Posts;
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
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/posts', [PostsController::class, 'index'])->name('posts');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts/save', [PostsController::class, 'save'])->name('posts.save');
    Route::get('posts/edit/{posts:slug}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/update/{id}', [PostsController::class, 'update'])->name('posts.update');
});
