<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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


}
