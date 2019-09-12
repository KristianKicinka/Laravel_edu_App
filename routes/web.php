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

use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('dashboard','DashboardController');

/*Teacher panel sidebar routes*/
Route::get('/teacher/dashboard', ['uses'=>'DashboardController@index','as'=>'teacherDashboard']);
Route::get('/teacher/settings', ['uses'=>'SettingsController@index', 'as'=>'teacherSettings']);
Route::get('/teacher/tests', ['uses'=>'TestsController@index', 'as'=>'teacherTests']);
Route::get('/teacher/materials', ['uses'=>'MaterialsController@index', 'as'=>'teacherMaterials']);
Route::get('/teacher/students', ['uses'=>'StudentsController@index', 'as'=>'teacherStudents']);
Route::get('/teacher/classrooms', ['uses'=>'ClassroomsController@index', 'as'=>'teacherClassrooms']);
Route::get('/teacher/subjects', ['uses'=>'SubjectsController@index', 'as'=>'teacherSubjects']);

Route::get('/teacher/tests/create',['as'=>'testCreate',function(){
    return view('home');
}]);
