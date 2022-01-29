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

Route::get('/', function () {return view('nav');} )->name('nav');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('articles')->group(function() {

    Route::get('', 'App\Http\Controllers\ArticleController@index')->name('article.index');
    Route::get('create', 'App\Http\Controllers\ArticleController@create')->name('article.create');
    Route::post('store', 'App\Http\Controllers\ArticleController@store' )->name('article.store');
    Route::get('edit/{article}', 'App\Http\Controllers\ArticleController@edit')->name('article.edit');
    Route::post('update/{article}', 'App\Http\Controllers\ArticleController@update')->name('article.update');
    // Route::post('destroy/{company}', 'App\Http\Controllers\CompanyController@destroy' )->name('company.destroy');
    // Route::get('show/{student}', 'App\Http\Controllers\StudentController@show')->name('student.show');

});