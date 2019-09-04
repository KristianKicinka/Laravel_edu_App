<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Teacher panel sidebar routes*/
Route::get('/teacher/dashboard', ['as' => 'teacherDashboard', function () {
    return view('home');
}]);
Route::get('/teacher/settings', ['as' => 'teacherSettings', function () {
    return view('home');
}]);
Route::get('/teacher/tests', ['as' => 'teacherTests', function () {
    return view('home');
}]);
Route::get('/teacher/materials', ['as' => 'teacherMaterials', function () {
    return view('home');
}]);
Route::get('/teacher/students', ['as' => 'teacherStudents', function () {
    return view('home');
}]);
Route::get('/teacher/classrooms', ['as' => 'teacherClassrooms', function () {
    return view('home');
}]);
Route::get('/teacher/subjects', ['as' => 'teacherSubjects', function () {
    return view('home');
}]);
