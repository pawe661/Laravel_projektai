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

Route::prefix('articles')->group(function() {
    Route::get('', 'App\Http\Controllers\ArticleController@index')->name('article.index');
    Route::get('create', 'App\Http\Controllers\ArticleController@create')->name('article.create');
    Route::post('store', 'App\Http\Controllers\ArticleController@store')->name('article.store');
    Route::post('storeAjax', 'App\Http\Controllers\ArticleController@storeAjax')->name('article.storeAjax');
    Route::post('delete/{article}', 'App\Http\Controllers\ArticleController@destroy')->name('article.destroy');
    Route::post('deleteAjax/{article}', 'App\Http\Controllers\ArticleController@destroyAjax')->name('article.destroyAjax');
    Route::get('showAjax/{article}', 'App\Http\Controllers\ArticleController@showAjax')->name('article.showAjax');
    Route::post('updateAjax/{article}', 'App\Http\Controllers\ArticleController@updateAjax')->name('article.updateAjax');
});

Route::prefix('types')->group(function() {
    Route::get('', 'App\Http\Controllers\TypeController@index')->name('type.index');
    // Route::get('create', 'App\Http\Controllers\TypeController@create')->name('client.create');
    // Route::post('store', 'App\Http\Controllers\TypeController@store')->name('client.store');
    // Route::post('storeAjax', 'App\Http\Controllers\TypeController@storeAjax')->name('client.storeAjax');
    // Route::post('delete/{client}', 'App\Http\Controllers\TypeController@destroy')->name('client.destroy');
    // Route::post('deleteAjax/{client}', 'App\Http\Controllers\TypeController@destroyAjax')->name('client.destroyAjax');
    // Route::get('showAjax/{client}', 'App\Http\Controllers\TypeController@showAjax')->name('client.showAjax');
    // Route::post('updateAjax/{client}', 'App\Http\Controllers\TypeController@updateAjax')->name('client.updateAjax');
});