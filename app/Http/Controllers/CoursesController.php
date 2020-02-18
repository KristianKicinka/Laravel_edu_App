<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_teacher==1) {
            $users = DB::table('users')->where('is_teacher', 0)->where('is_admin', 0)->paginate(10);
            $courses = DB::table('courses')->paginate(10);
            $subjects = DB::table("subjects")->paginate(10);
            return view('Backend.TeacherInterface.content.Courses.index', compact("users"), compact("subjects"))->with("courses", $courses);
        }

        $users = DB::table('users')->where('is_teacher', 0)->where('is_admin', 0)->paginate(10);
        $courses = DB::table('courses')->whereJsonContains("students",Auth::user()->name)->paginate(10);
        $subjects = DB::table("subjects")->paginate(10);
        return view('Backend.StudentInterface.content.Courses.index', compact("users"), compact("subjects"))->with("courses", $courses);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'class_name_val.unique:courses,name' => 'The :attribute is already used'
        ];

        $validate = \Validator::make($request->all(),[
            'class_name_val'=> 'required|unique:courses,name'
        ], $messages)->validated();

        $course = new Course;
        $user = Auth::user();

        $course->name = $validate['class_name_val'];
        $course->count_of_students = Input::get('class_count_val');
        $course->subject = json_encode(Input::get('subjectsArray'));
        $course->students = json_encode(Input::get('studentsArray'));
        $course->teacher_id = $user->id;
        $course->save();

        return \Redirect::route("Classrooms");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('courses')->where('id','=', $id)->delete();

        return \Redirect::route("Classrooms");
    }
}
