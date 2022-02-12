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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('tasks')->group(function() {

    Route::get('', 'App\Http\Controllers\TaskController@index')->name('task.index');
    Route::get('taskfilter', 'App\Http\Controllers\TaskController@productfilter')->name('task.taskfilter');
});

Route::prefix('paginationSettings')->group(function() {

    Route::get('edit/{paginationSetting}', 'App\Http\Controllers\PaginationSettingController@edit')->name('paginationSetting.edit');
    Route::post('update/{paginationSetting}', 'App\Http\Controllers\PaginationSettingController@update')->name('paginationSetting.update');
    
});