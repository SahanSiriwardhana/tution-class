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
    Route::get('teacher-dashboard', 'TeacherController@indexDashboard');
    Route::post('teacher', [
        'uses'=>'TeacherController@store',
        'as'=>'teacher-register'
    ]);
    Route::post('teacher/{id}', [
        'uses'=>'TeacherController@update',
        'as'=>'teacher-update'
    ]);
    Route::get('teacher/{id}', 'TeacherController@edit');
    Route::get('teacher-class/{id}', 'TeacherController@show');
    Route::get('teacher-delete/{id}', 'TeacherController@destroy');
    Route::get('teacher-enter', 'TeacherController@create');

    Route::get('student','StudentController@index' );
    Route::get('student-dashboard', 'StudentController@indexDashboard');
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
    Route::get('student-delete/{id}', 'StudentController@destroy');

    Route::get('class', 'InstituteClassController@index');
    Route::post('class', [
        'uses'=>'InstituteClassController@store',
        'as'=>'class-register'
    ]);
    
    Route::post('class/{id}', [
        'uses'=>'InstituteClassController@update',
        'as'=>'class-update'
    ]);
    Route::get('class-student/{id}', 'InstituteClassController@classStudentIndex');
    
    Route::get('class-enter', 'InstituteClassController@create');
    Route::get('class/{id}', 'InstituteClassController@edit');
    Route::get('class-delete/{id}', 'InstituteClassController@destroy');

    
    Route::get('enrollment', 'ClassStudentController@index');
    Route::post('class-enrollment', [
        'uses'=>'ClassStudentController@store',
        'as'=>'class-enrollment'
    ]);
    
    Route::post('class/{id}', [
        'uses'=>'InstituteClassController@update',
        'as'=>'class-update'
    ]);

    Route::get('payment', 'ClassPaymentController@index');
    Route::post('payment-create', [
        'uses'=>'ClassPaymentController@store',
        'as'=>'payment-create'
    ]);

    Route::get('notification', 'NotificationController@index');
    Route::post('notification', [
        'uses'=>'NotificationController@store',
        'as'=>'notification-post'
    ]);
    Route::post('notification/{id}', [
        'uses'=>'NotificationController@update',
        'as'=>'notification-update'
    ]);
    Route::get('notification/{id}', 'NotificationController@edit');
    Route::get('notification-delete/{id}', 'TeacherController@destroy');
    Route::get('notification-create', 'NotificationController@create');
});

Route::post('class', [
    'uses'=>'ClassStudentController@getAutoCompleteClass',
    'as'=>'class-search'
]);