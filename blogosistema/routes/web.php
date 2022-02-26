<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {return view('nav');} )->name('nav');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('posts')->group(function() {

    Route::get('', 'App\Http\Controllers\PostController@index')->name('post.index');
    Route::get('create', 'App\Http\Controllers\PostController@create')->name('post.create');
    Route::post('store', 'App\Http\Controllers\PostController@store' )->name('post.store');
    Route::get('edit/{post}', 'App\Http\Controllers\PostController@edit')->name('post.edit');
    Route::post('update/{post}', 'App\Http\Controllers\PostController@update')->name('post.update');
    Route::post('destroy/{post}', 'App\Http\Controllers\PostController@destroy' )->name('post.destroy');
    Route::get('show/{post}', 'App\Http\Controllers\PostController@show')->name('post.show');
    Route::get('masscreate', 'App\Http\Controllers\PostController@masscreate')->name('post.masscreate');

});

Route::prefix('categories')->group(function() {

    Route::get('', 'App\Http\Controllers\CategoryController@index')->name('category.index');
    Route::get('create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
    Route::post('store', 'App\Http\Controllers\CategoryController@store' )->name('category.store');
    Route::get('edit/{category}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
    Route::post('update/{category}', 'App\Http\Controllers\CategoryController@update')->name('category.update');
    Route::post('destroy/{category}', 'App\Http\Controllers\CategoryController@destroy' )->name('category.destroy');
    Route::get('show/{category}', 'App\Http\Controllers\CategoryController@show')->name('category.show');
    Route::get('masscreate', 'App\Http\Controllers\CategoryController@masscreate')->name('category.masscreate');

});

Route::prefix('tasks')->group(function() {

    Route::get('', 'App\Http\Controllers\TaskController@index')->name('task.index');
    Route::get('create', 'App\Http\Controllers\TaskController@create')->name('task.create');
    Route::post('store', 'App\Http\Controllers\TaskController@store' )->name('task.store');
    Route::get('edit/{task}', 'App\Http\Controllers\TaskController@edit')->name('task.edit');
    Route::post('update/{task}', 'App\Http\Controllers\TaskController@update')->name('task.update');
    Route::post('destroy/{task}', 'App\Http\Controllers\TaskController@destroy' )->name('task.destroy');
    Route::get('show/{task}', 'App\Http\Controllers\TaskController@show')->name('task.show');
   
});

Route::prefix('owners')->group(function() {

    Route::get('', 'App\Http\Controllers\OwnerController@index')->name('owner.index');
    Route::get('create', 'App\Http\Controllers\OwnerController@create')->name('owner.create');
    Route::post('store', 'App\Http\Controllers\OwnerController@store' )->name('owner.store');
    Route::get('edit/{owner}', 'App\Http\Controllers\OwnerController@edit')->name('owner.edit');
    Route::post('update/{owner}', 'App\Http\Controllers\OwnerController@update')->name('owner.update');
    Route::post('destroy/{owner}', 'App\Http\Controllers\OwnerController@destroy' )->name('owner.destroy');
    Route::get('show/{owner}', 'App\Http\Controllers\OwnerController@show')->name('owner.show');
    

});
