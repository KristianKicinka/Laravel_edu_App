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

/*Teacher panel sidebar routes*/
Route::get('/dashboard', ['uses'=>'DashboardController@index','as'=>'Dashboard']);
Route::get('/settings', ['uses'=>'SettingsController@index', 'as'=>'Settings']);
Route::get('/tests', ['uses'=>'TestsController@index', 'as'=>'Tests']);
Route::get('/materials', ['uses'=>'MaterialsController@index', 'as'=>'Materials']);
Route::get('/students', ['uses'=>'StudentsController@index', 'as'=>'Students']);
Route::get('/classrooms', ['uses'=>'ClassroomsController@index', 'as'=>'Classrooms']);
Route::get('/subjects', ['uses'=>'SubjectsController@index', 'as'=>'Subjects']);
Route::get('/tests/create',['uses'=>'TestsController@create', 'as'=>'testCreate']);
Route::post('/tests/create/questions',['uses'=>'TestsController@questions',]);
Route::post('/tests/create/test',['uses'=>'TestsController@store',]);
Route::post('/subjects/create', ['uses'=>'SubjectsController@create', 'as'=>'subjectCreate']);




