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
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::prefix('authors')->group(function(){

    // Index./authors
    Route::get('','App\Http\Controllers\AuthorController@index')->name('author.index');
    Route::get('create','App\Http\Controllers\AuthorController@create')->name('author.create');
    Route::post('store','App\Http\Controllers\AuthorController@store')->name('author.store');
    //SU STORE turi buti POST metodas

    // Edit form
    Route::get('edit/{author}','App\Http\Controllers\AuthorController@edit')->name('author.edit');
    //Update po Edit
    Route::post('update/{author}','App\Http\Controllers\AuthorController@update')->name('author.update');

}
);