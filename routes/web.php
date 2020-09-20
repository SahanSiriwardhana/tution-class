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

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', function () {return view('admin.index');});

    Route::get('teacher', 'TeacherController@index');
    Route::post('teacher', [
        'uses'=>'TeacherController@store',
        'as'=>'teacher-register'
    ]);
    Route::post('teacher/{id}', [
        'uses'=>'TeacherController@update',
        'as'=>'teacher-update'
    ]);
    Route::get('teacher/{id}', 'TeacherController@edit');
    Route::get('teacher-delete/{id}', 'TeacherController@destroy');
    Route::get('teacher-enter', 'TeacherController@create');

    Route::get('student','StudentController@index' );
    Route::get('student-enter','StudentController@create');
    Route::post('student', [
        'uses'=>'StudentController@store',
        'as'=>'student-register'
    ]);
    Route::post('student/{id}', [
        'uses'=>'StudentController@update',
        'as'=>'student-update'
    ]);
    Route::get('student/{id}', 'StudentController@edit');

    Route::get('class', function () {return view('admin.class');});
    Route::get('class-enter', function () {return view('admin.class-enter');});

    Route::get('payment', function () {return view('admin.payment');});
});