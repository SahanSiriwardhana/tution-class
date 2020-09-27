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
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', 'UserController@index');
Route::post('/login', [
    'uses'=>'UserController@LoginUser',
    'as'=>'login'
] );
Route::get('/logout', 'UserController@logout');


Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@index');

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

    Route::get('class', 'InstituteClassController@index');
    Route::post('class', [
        'uses'=>'InstituteClassController@store',
        'as'=>'class-register'
    ]);
    
    Route::post('class/{id}', [
        'uses'=>'InstituteClassController@update',
        'as'=>'class-update'
    ]);
    Route::get('class-enter', 'InstituteClassController@create');
    Route::get('class/{id}', 'InstituteClassController@edit');

    Route::get('payment', function () {return view('admin.payment');});
});