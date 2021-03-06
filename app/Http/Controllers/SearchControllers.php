<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;

class SearchControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    public function courses(){
        if(($_REQUEST['searchCourses']) != null){
            if (($_REQUEST['searchCourses']) != null){
                $search = $_REQUEST['searchCourses'];
            }


            if (($_REQUEST['searchCourses']) != null ){
                $courses = DB::table('courses')
                    ->select('*')
                    ->where("name", 'Like','%'.$search.'%')
                    ->orWhere('count_of_students','Like','%'.$search.'%')
                    ->orWhere('subject','Like','%'.$search.'%')
                    ->orWhere('students','Like','%'.$search.'%')
                    ->paginate(5);
                //->paginate(5);
               // $categoriesArray = DB::table("categories")->select("name")->get();
                $subjects = DB::table("subjects")->paginate(10);
                $users = DB::table('users')->where('is_teacher', 0)->where('is_admin', 0)->paginate(10);

                return view("Backend.TeacherInterface.content.Courses.index",compact("courses"),compact("subjects"))->with("users",$users);
            }
            else{
                return view("Backend.TeacherInterface.content.Courses.index",compact("subjects"),compact("users"));

            }

        }
        $subjects = DB::table("subjects")->paginate(10);
        $users = DB::table('users')->where('is_teacher', 0)->where('is_admin', 0)->paginate(10);
        return view("Backend.TeacherInterface.content.Courses.index", compact("subjects"), compact("users"));

    }


    public function coursesStudent(){
        if(($_REQUEST['searchCoursesStudent']) != null){
            if (($_REQUEST['searchCoursesStudent']) != null){
                $search = $_REQUEST['searchCoursesStudent'];
            }


            if (($_REQUEST['searchCoursesStudent']) != null ){
                $courses = DB::table('courses')
                    ->select('*')
                    ->where("name", 'Like','%'.$search.'%')
                    ->orWhere('count_of_students','Like','%'.$search.'%')
                    ->orWhere('subject','Like','%'.$search.'%')
                    ->orWhere('students','Like','%'.$search.'%')
                    ->whereJsonContains("students",\Auth::user()->name)
                    ->paginate(5);

                $courses = \DB::table('courses')->whereJsonContains("students",\Auth::user()->name)->paginate(10);
                $courses_array = $courses->pluck("name")->toarray();
                $tests = DB::table('test_service')->where(function($query) use ($courses_array){
                    foreach ($courses_array as $course) {
                        $query->orWhereJsonContains('activate_for',$course);
                    }
                })->get();
                $materials = DB::table('materials')->where(function($query) use ($courses_array){
                    foreach ($courses_array as $course) {
                        $query->orWhereJsonContains('class',$course);
                    }
                })->get();
                $p=0;
                foreach ($courses_array as $course){
                    $p=0;
                    foreach ($materials as $material){
                        if(json_decode($material->class,true)==$course){
                            $p=$p+1;
                        }else{
                            $p=$p;
                        }
                    }
                    $counts[$course] = $p;
                }

                foreach ($courses_array as $course){
                    $p=0;
                    foreach ($tests as $test){

                        if(json_decode($test->activate_for,true)[0]==$course){
                            $p=$p+1;
                        }else{
                            $p=$p;
                        }
                    }
                    $counts_tests[$course] = $p;
                }

                return view("Backend.StudentInterface.content.Courses.index",compact("courses"),compact("counts"))->with("counts_tests",$counts_tests);
            }
            else{
                $courses = DB::table('courses')->paginate(10)->whereJsonContains("students",\Auth::user()->name);
                $courses_array = $courses->pluck("name")->toarray();
                $tests = DB::table('test_service')->where(function($query) use ($courses_array){
                    foreach ($courses_array as $course) {
                        $query->orWhereJsonContains('activate_for',$course);
                    }
                })->get();
                $materials = DB::table('materials')->where(function($query) use ($courses_array){
                    foreach ($courses_array as $course) {
                        $query->orWhereJsonContains('class',$course);
                    }
                })->get();
                $p=0;
                foreach ($courses_array as $course){
                    $p=0;
                    foreach ($materials as $material){
                        if(json_decode($material->class,true)==$course){
                            $p=$p+1;
                        }else{
                            $p=$p;
                        }
                    }
                    $counts[$course] = $p;
                }

                foreach ($courses_array as $course){
                    $p=0;
                    foreach ($tests as $test){

                        if(json_decode($test->activate_for,true)[0]==$course){
                            $p=$p+1;
                        }else{
                            $p=$p;
                        }
                    }
                    $counts_tests[$course] = $p;
                }
                return view("Backend.StudentInterface.content.Courses.index",compact("courses"),compact("counts"))->with("counts_tests",$counts_tests);

            }

        }
        $courses = DB::table('courses')->paginate(10)->whereJsonContains("students",\Auth::user()->name);
        $courses_array = $courses->pluck("name")->toarray();
        $tests = DB::table('test_service')->where(function($query) use ($courses_array){
            foreach ($courses_array as $course) {
                $query->orWhereJsonContains('activate_for',$course);
            }
        })->get();
        $materials = DB::table('materials')->where(function($query) use ($courses_array){
            foreach ($courses_array as $course) {
                $query->orWhereJsonContains('class',$course);
            }
        })->get();
        $p=0;
        foreach ($courses_array as $course){
            $p=0;
            foreach ($materials as $material){
                if(json_decode($material->class,true)==$course){
                    $p=$p+1;
                }else{
                    $p=$p;
                }
            }
            $counts[$course] = $p;
        }

        foreach ($courses_array as $course){
            $p=0;
            foreach ($tests as $test){

                if(json_decode($test->activate_for,true)[0]==$course){
                    $p=$p+1;
                }else{
                    $p=$p;
                }
            }
            $counts_tests[$course] = $p;
        }
        return view("Backend.StudentInterface.content.Courses.index", compact("courses"), compact("counts"))->with("counts_tests",$counts_tests);

    }


    public function materials(){
        if(($_REQUEST['searchMaterials']) != null){
            if (($_REQUEST['searchMaterials']) != null){
                $search = $_REQUEST['searchMaterials'];
            }


            if (($_REQUEST['searchMaterials']) != null ){
                $materials = DB::table('materials')
                    ->select('*')
                    ->where("title", 'Like','%'.$search.'%')
                    ->orWhere('subject','Like','%'.$search.'%')
                    ->orWhere('class','Like','%'.$search.'%')
                    ->orWhere('filename','Like','%'.$search.'%')
                    ->orWhere('author','Like','%'.$search.'%')
                    ->paginate(5);
                //->paginate(5);
                // $categoriesArray = DB::table("categories")->select("name")->get();
                $subjects = DB::table("subjects")->paginate(10);
                $courses = DB::table('courses')->paginate(10);

                return view("Backend.TeacherInterface.content.Materials.index",compact("materials"),compact("subjects"))->with("courses",$courses);
            }
            else{
                $materials = DB::table("materials")->paginate(10);
                return view("Backend.TeacherInterface.content.Materials.index", compact("subjects"),compact("courses"))->with("materials",$materials);

            }
        }
        $subjects = DB::table("subjects")->paginate(10);
        $courses = DB::table('courses')->paginate(10);
        $materials = DB::table("materials")->paginate(10);
        return view("Backend.TeacherInterface.content.Materials.index", compact("subjects"), compact("courses"))->with("materials",$materials);
    }


    public function students(){
        if(($_REQUEST['searchStudents']) != null){
            if (($_REQUEST['searchStudents']) != null){
                $search = $_REQUEST['searchStudents'];
            }


            if (($_REQUEST['searchStudents']) != null ){
                $users = DB::table('users')
                    ->select('*')
                    ->where("name", 'Like','%'.$search.'%')
                    ->orWhere('email','Like','%'.$search.'%')
                    ->where('is_teacher',0)
                    ->where('is_admin',0)
                    ->paginate(5);

                $subjects = DB::table("subjects")->paginate(10);
                $courses = DB::table('courses')->paginate(10);

                return view("Backend.TeacherInterface.content.Students.index",compact("users"),compact("subjects"))->with("courses",$courses);
            }
            else{
                $users = DB::table('users')->where('is_teacher', 0)->where('is_admin',0)->paginate(10);
                return view("Backend.TeacherInterface.content.Students.index", compact("subjects"),compact("courses"))->with("users",$users);

            }
        }
        $subjects = DB::table("subjects")->paginate(10);
        $courses = DB::table('courses')->paginate(10);
        $users = DB::table('users')->where('is_teacher', 0)->where('is_admin',0)->paginate(10);
        return view("Backend.TeacherInterface.content.Students.index", compact("subjects"), compact("courses"))->with("users",$users);
    }


    public function results(){
        if(($_REQUEST['searchResults']) != null){
            if (($_REQUEST['searchResults']) != null){
                $search = $_REQUEST['searchResults'];
            }


            if (($_REQUEST['searchResults']) != null ){


                $results = \DB::table("results")
                    ->join('users','users.id','=','results.user_id')
                    ->join('tests','tests.id','=','results.test_id')
                    ->join('test_service',"test_service.test_id","=","results.test_id")
                    ->select(
                        ["results.id AS id",
                            "users.name AS user_name",
                            "test_service.activate_for AS activate_for",
                            "tests.name AS test_name",
                            "results.points AS points",
                            "results.percentage AS percentage"])
                    ->where('users.name','Like','%'.$search.'%')
                    ->orWhere('test_service.activate_for','Like','%'.$search.'%')
                    ->orWhere('tests.name','Like','%'.$search.'%')
                    ->orWhere('results.points','Like','%'.$search.'%')
                    ->orWhere('results.percentage','Like','%'.$search.'%')
                    ->paginate(10);


                return view("Backend.TeacherInterface.content.Results.index",compact("results"));
            }
            else{
                $results = \DB::table("results")
                    ->join('users','users.id','=','results.user_id')
                    ->join('tests','tests.id','=','results.test_id')
                    ->join('test_service',"test_service.test_id","=","results.test_id")
                    ->select(
                        ["results.id AS id",
                            "users.name AS user_name",
                            "test_service.activate_for AS activate_for",
                            "tests.name AS test_name",
                            "results.points AS points",
                            "results.percentage AS percentage"])
                    ->paginate(10);
                return view("Backend.TeacherInterface.content.Results.index", compact("results"));

            }
        }

        $results = \DB::table("results")
            ->join('users','users.id','=','results.user_id')
            ->join('tests','tests.id','=','results.test_id')
            ->join('test_service',"test_service.test_id","=","results.test_id")
            ->select(
                ["results.id AS id",
                    "users.name AS user_name",
                    "test_service.activate_for AS activate_for",
                    "tests.name AS test_name",
                    "results.points AS points",
                    "results.percentage AS percentage"])
            ->paginate(10);
        return view("Backend.TeacherInterface.content.Results.index", compact("results"));
    }


    public function tests(){
        if(($_REQUEST['searchTests']) != null){
            if (($_REQUEST['searchTests']) != null){
                $search = $_REQUEST['searchTests'];
            }


            if (($_REQUEST['searchTests']) != null ){
                $tests = DB::table('tests')
                    ->select('*')
                    ->where("name", 'Like','%'.$search.'%')
                    ->orWhere('options_count','Like','%'.$search.'%')
                    ->orWhere('questions_count','Like','%'.$search.'%')
                    ->paginate(5);

                $subjects = DB::table("subjects")->paginate(10);
                $courses = DB::table('courses')->paginate(10);

                return view("Backend.TeacherInterface.content.Tests.index",compact("tests"),compact("subjects"))->with("courses",$courses);
            }
            else{
                $tests = DB::table('tests')->paginate(10);
                return view("Backend.TeacherInterface.content.Tests.index", compact("subjects"),compact("courses"))->with("tests",$tests);

            }
        }
        $subjects = DB::table("subjects")->paginate(10);
        $courses = DB::table('courses')->paginate(10);
        $tests = DB::table('tests')->paginate(10);
        return view("Backend.TeacherInterface.content.Tests.index", compact("subjects"),compact("courses"))->with("tests",$tests);
    }


    public function testsStudent(){
        if(($_REQUEST['searchTestsStudent']) != null){
            if (($_REQUEST['searchTestsStudent']) != null){
                $search = $_REQUEST['searchTestsStudent'];
            }


            if (($_REQUEST['searchTestsStudent']) != null ){
                $courses = \DB::table('courses')->select("name")->whereJsonContains("students",\Auth::user()->name);
                $courses=$courses->pluck('name')->toArray();


                $tests = \DB::table('tests')
                    ->join('test_service', 'test_service.test_id', '=', 'tests.id')
                    ->join('results','results.test_id','=','tests.id')
                    ->where("results.user_id","=",\Auth::user()->id)
                    ->where('test_service.expiration','>=', now() )
                    ->where("tests.is_active","=",1 and function($query) use ($courses){
                            foreach ($courses as $course) {
                                $query->orWhereJsonContains('test_service.activate_for',$course);
                            }

                        })
                    ->Where('name','Like','%'.$search.'%')
                    ->orWhere('questions_count','Like','%'.$search.'%')
                    ->paginate(10);

                return view("Backend.StudentInterface.content.Tests.index",compact("tests"));
            }
            else{
                $courses = \DB::table('courses')->select("name")->whereJsonContains("students",\Auth::user()->name);
                $courses=$courses->pluck('name')->toArray();
                $tests = \DB::table('tests')
                    ->join('test_service', 'test_service.test_id', '=', 'tests.id')
                    ->join('results','results.test_id','=','tests.id')
                    ->where("results.user_id","=",\Auth::user()->id)
                    ->where('test_service.expiration','>=', now() )
                    ->where("tests.is_active","=",1 and function($query) use ($courses){
                            foreach ($courses as $course) {
                                $query->orWhereJsonContains('test_service.activate_for',$course);
                            }
                        })->paginate(10);
                return view("Backend.StudentInterface.content.Tests.index", compact("tests"));

            }
        }
        $courses = \DB::table('courses')->select("name")->whereJsonContains("students",\Auth::user()->name);
        $courses=$courses->pluck('name')->toArray();
        $tests = \DB::table('tests')
            ->join('test_service', 'test_service.test_id', '=', 'tests.id')
            ->join('results','results.test_id','=','tests.id')
            ->where("results.user_id","=",\Auth::user()->id)
            ->where('test_service.expiration','>=', now() )
            ->where("tests.is_active","=",1 and function($query) use ($courses){
                    foreach ($courses as $course) {
                        $query->orWhereJsonContains('test_service.activate_for',$course);
                    }
                })->paginate(10);
        return view("Backend.StudentInterface.content.Tests.index", compact("tests"));
    }



    public function materialsStudent(){
        if(($_REQUEST['searchMaterialsStudent']) != null){
            if (($_REQUEST['searchMaterialsStudent']) != null){
                $search = $_REQUEST['searchMaterialsStudent'];
            }


            if (($_REQUEST['searchMaterialsStudent']) != null ){
               /* $subjects = DB::table('subjects')->paginate(10);*/
                $courses = DB::table('courses')->select("name")->whereJsonContains("students",\Auth::user()->name);

                $courses=$courses->pluck('name')->toArray();
                $materials = DB::table('materials')->where(function($query) use ($courses){
                    foreach ($courses as $course) {
                        $query->orWhereJsonContains('class',$course);
                    }
                })
                    ->where('title','Like','%'.$search.'%')
                    ->orWhere('class','Like','%'.$search.'%')
                    ->orWhere('subject','Like','%'.$search.'%')
                    ->paginate(10);

                return view("Backend.StudentInterface.content.Materials.index",compact("materials"));
            }
            else{
                $courses = DB::table('courses')->select("name")->whereJsonContains("students",\Auth::user()->name);

                $courses=$courses->pluck('name')->toArray();
                $materials = DB::table('materials')->where(function($query) use ($courses){
                    foreach ($courses as $course) {
                        $query->orWhereJsonContains('class',$course);
                    }
                })->paginate(10);
                return view("Backend.StudentInterface.content.Materials.index", compact("materials"));

            }
        }
        $courses = DB::table('courses')->select("name")->whereJsonContains("students",\Auth::user()->name);

        $courses=$courses->pluck('name')->toArray();
        $materials = DB::table('materials')->where(function($query) use ($courses){
            foreach ($courses as $course) {
                $query->orWhereJsonContains('class',$course);
            }
        })->paginate(10);

        return view("Backend.StudentInterface.content.Materials.index", compact("materials"));
    }


}
