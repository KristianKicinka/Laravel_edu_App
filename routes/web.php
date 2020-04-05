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
use App\Mail\ContactMail;
use App\Mail\NewsletterMail;
use App\Mail\SendPdfMail;


Route::get('/',['uses'=>'MainController@index','as'=>'Index']);
Route::get('/home', function () {
    if (Auth::user()->is_teacher==1){
        return view('Backend.TeacherInterface.content.Dashboard.index');
    }if (Auth::user()->is_admin==1){
        return view('Backend.AdminInterface.content.Dashboard.index');
    }

    return view('Backend.StudentInterface.content.Dashboard.index');

});



Auth::routes();
/*Routes for Chat*/
Route::get("/chat",["uses"=>"ChatController@index","as"=>"Chat"]);
Route::get('/message/{id}','ChatController@getMessage')->name("message");
Route::post('message','ChatController@sendMessage');
Route::get("/chat/videocall",["uses"=>"ChatController@videoCall","as"=>"videoCall"]);


/*Routes for pdf*/
Route::get('/pdf/{id}',['uses'=>'PDFController@index','as'=>'Certificate']);
/*Actuality routes*/
Route::get('/actualities', ['uses'=>'ActualityController@index', 'as'=>'Actuality']);
Route::post('/actuality/create', ['uses'=>'ActualityController@store', 'as'=>'actualityCreate']);
Route::post('/actuality/delete/{id}', ['uses'=>'ActualityController@destroy', 'as'=>'actualityDelete']);

/*Teacher panel sidebar routes*/

/*Routes for Dashboard*/
Route::get('/dashboard', ['uses'=>'DashboardController@index','as'=>'Dashboard']);
/*Routes for Materials*/
Route::get('/materials', ['uses'=>'MaterialsController@index', 'as'=>'Materials']);
Route::post('/materials/create', ['uses'=>'MaterialsController@store', 'as'=>'materialCreate']);
Route::get('/materials/download/{file}', ['uses'=>'MaterialsController@download', 'as'=>'materialDownload']);
Route::post('/materials/edit/{id}', ['uses'=>'MaterialsController@update', 'as'=>'materialEdit']);
Route::post('/materials/delete/{id}', ['uses'=>'MaterialsController@destroy', 'as'=>'materialDelete']);

/*Routes for Students*/
Route::get('/students', ['uses'=>'StudentsController@index', 'as'=>'Students']);
Route::post('/students/create', ['uses'=>'StudentsController@create', 'as'=>'studentCreate']);
Route::post('/students/edit/{id}', ['uses'=>'StudentsController@update', 'as'=>'studentEdit']);
Route::post('/students/delete/{id}', ['uses'=>'StudentsController@destroy', 'as'=>'studentDelete']);

/*Routes for Users*/
Route::get('/users', ['uses'=>'UsersController@index', 'as'=>'Users']);
Route::post('/users/create', ['uses'=>'UsersController@create', 'as'=>'userCreate']);
Route::post('/users/edit/{id}', ['uses'=>'UsersController@edit', 'as'=>'userEdit']);
Route::post('/users/delete/{id}', ['uses'=>'UsersController@destroy', 'as'=>'userDelete']);

/*Routes for Tests*/
Route::get('/tests', ['uses'=>'TestsController@index', 'as'=>'Tests']);
Route::get('/tests/testing/{id}',['uses'=>'TestsController@testing', 'as'=>'Testing']);
Route::get('/tests/showResults/{id}',['uses'=>'TestsController@showResults', 'as'=>'showResults']);
Route::get('/tests/results/{id}',['uses'=>'TestsController@saveResaults', 'as'=>'saveResaults']);
Route::get('/tests/testing/resaults/{id}',['uses'=>'TestsController@testingResaults', 'as'=>'Resaults']);
Route::get('/tests/create',['uses'=>'TestsController@create', 'as'=>'testCreate']);
Route::post('/tests/delete/{id}',['uses'=>'TestsController@destroy', 'as'=>'testDelete']);
Route::post('/tests/activate/{id}',['uses'=>'TestsController@activate', 'as'=>'testActivate']);
Route::get('/tests/show/{id}',['uses'=>'TestsController@show', 'as'=>'testShow']);
Route::post('/tests/create/questions',['uses'=>'TestsController@questions',]);
Route::post('/tests/create/test',['uses'=>'TestsController@store',]);

/*Routes for subjects*/
Route::get('/subjects', ['uses'=>'SubjectsController@index', 'as'=>'Subjects']);
Route::post('/subjects/create', ['uses'=>'SubjectsController@create', 'as'=>'subjectCreate']);
Route::post('/subjects/edit/{id}', ['uses'=>'SubjectsController@edit', 'as'=>'subjectEdit']);
Route::post('/subjects/delete/{id}', ['uses'=>'SubjectsController@destroy', 'as'=>'subjectDelete']);
/*Routes for settings*/
Route::get('/settings', ['uses'=>'SettingsController@index', 'as'=>'Settings']);
Route::post('/settings/username/edit/{id}', ['uses'=>'SettingsController@username', 'as'=>'usernameEdit']);
Route::post('/settings/profilepicture/edit/{id}', ['uses'=>'SettingsController@profilePicture', 'as'=>'profilePictureEdit']);
Route::post('/settings/email/edit/{id}', ['uses'=>'SettingsController@email', 'as'=>'emailEdit']);
Route::post('/settings/password/edit/{id}', ['uses'=>'SettingsController@password', 'as'=>'passwordEdit']);
/*Routes for Classrooms*/
Route::get('/classrooms', ['uses'=>'CoursesController@index', 'as'=>'Classrooms']);
Route::post('/classrooms/create', ['uses'=>'CoursesController@create', 'as'=>'classroomCreate']);
Route::post('/classrooms/edit/{id}', ['uses'=>'CoursesController@update', 'as'=>'classroomEdit']);
Route::post('/classrooms/delete/{id}', ['uses'=>'CoursesController@destroy', 'as'=>'classroomDelete']);

/*Routes for Results*/
Route::get('/results', ['uses'=>'ResultsController@index', 'as'=>'Results']);
Route::post('/result/edit/{id}', ['uses'=>'ResultsController@update', 'as'=>'resultEdit']);
Route::post('/result/delete/{id}', ['uses'=>'ResultsController@destroy', 'as'=>'resultDelete']);

/*Routes for search*/
Route::post('/searchCourses',['uses' => 'SearchControllers@courses', 'as' => 'courses']);
Route::post('/searchMaterials',['uses' => 'SearchControllers@materials', 'as' => 'materials']);
Route::post('/searchStudents',['uses'=>'SearchControllers@students', 'as' => 'students']);
Route::post('/searchTests',['uses'=>'SearchControllers@tests', 'as' => 'tests']);
Route::post('/searchResults',['uses'=>'SearchControllers@results', 'as' => 'results']);
Route::post('/searchCoursesStudent',['uses' => 'SearchControllers@coursesStudent', 'as' => 'coursesStudent']);
Route::post('/searchTestsStudent',['uses' => 'SearchControllers@testsStudent', 'as' => 'testsStudent']);
Route::post('/searchMaterialsStudent',['uses' => 'SearchControllers@materialsStudent', 'as' => 'materialsStudent']);



/*Routes for newsletter*/
Route::get('/newsletter',['uses' => 'NewsletterController@index', 'as' => 'Newsletter']);


Route::get('/sendmail',['uses'=>'MailController@basic_email','as'=>'mailSender']);

Route::post('/sendmail',['uses'=>'MailController@basic_email','as'=>'mailSender']);
Route::post("/sendNewsletter",function (){
    $request = request()->all();
    Mail::to($request['email'])->send(new NewsletterMail($request));
    return redirect('/');
})->name('sendNewsletterMail');
Route::post("/contact",function (){
    $request = request()->all();
    Mail::to('kicinka@spse-po.sk')->send(new ContactMail($request));
    return redirect('/');
})->name('sendContactMail');


Route::post("/sendNewsletterPdf",function (){
    $emails = DB::table("newsletter")->get("email");
    $request = request()->all();
    foreach ($emails as $email){
        Mail::to($email)->send(new SendPdfMail($request));
    }
    return redirect(route("Newsletter"));
})->name('sendNewsletterPdf');




