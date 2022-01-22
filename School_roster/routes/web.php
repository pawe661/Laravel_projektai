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

Route::get('/', function () {return view('home');} )->name('home');

//Atsako už students routing 
Route::prefix('students')->group(function() {

     //Index.
    Route::get('', 'App\Http\Controllers\StudentController@index')->name('student.index');
   //Create
    Route::get('create', 'App\Http\Controllers\StudentController@create')->name('student.create');
    Route::post('store', 'App\Http\Controllers\StudentController@store' )->name('student.store');
    // Edit form,
    Route::get('edit/{student}', 'App\Http\Controllers\StudentController@edit')->name('student.edit');
    Route::post('update/{student}', 'App\Http\Controllers\StudentController@update')->name('student.update');
    //Delete
    Route::post('destroy/{student}', 'App\Http\Controllers\StudentController@destroy' )->name('student.destroy');
    //Show
    Route::get('show/{student}', 'App\Http\Controllers\StudentController@show')->name('student.show');


});
//Atsako už groups routing 
Route::prefix('groups')->group(function() {

    //Index.
    Route::get('', 'App\Http\Controllers\AttendanceGroupController@index')->name('group.index');
    //Create
    Route::get('create', 'App\Http\Controllers\AttendanceGroupController@create')->name('group.create');
    Route::post('store', 'App\Http\Controllers\AttendanceGroupController@store' )->name('group.store');
    // Edit form,
    Route::get('edit/{group}', 'App\Http\Controllers\AttendanceGroupController@edit')->name('group.edit');
    Route::post('update/{group}', 'App\Http\Controllers\AttendanceGroupController@update')->name('group.update');
    //Delete
    Route::post('destroy/{group}', 'App\Http\Controllers\AttendanceGroupController@destroy' )->name('group.destroy');
    //Show
    Route::get('show/{group}', 'App\Http\Controllers\AttendanceGroupController@show')->name('group.show');


});
//Atsako už schools routing 
Route::prefix('schools')->group(function() {

    //Index.
    Route::get('', 'App\Http\Controllers\SchoolController@index')->name('school.index');
    //Create
    Route::get('create', 'App\Http\Controllers\SchoolController@create')->name('school.create');
    Route::post('store', 'App\Http\Controllers\SchoolController@store' )->name('school.store');
    // Edit form
    Route::get('edit/{school}', 'App\Http\Controllers\SchoolController@edit')->name('school.edit');
    Route::post('update/{school}', 'App\Http\Controllers\SchoolController@update')->name('school.update');
    //Delete
    Route::post('destroy/{school}', 'App\Http\Controllers\SchoolController@destroy' )->name('school.destroy');
    //Show
    Route::get('show/{school}', 'App\Http\Controllers\SchoolController@show')->name('school.show');


});
