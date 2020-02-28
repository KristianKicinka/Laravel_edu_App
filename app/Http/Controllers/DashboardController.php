<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(\Auth::user()->is_teacher==1){
            $tests_count = \DB::table("tests")->where("author","=",\Auth::user()->name)->count();
            $materials_count = \DB::table("materials")->where("author","=",\Auth::user()->name)->count();
            return view('Backend.TeacherInterface.content.Dashboard.index')->with("tests_count",$tests_count)->with("materials_count",$materials_count);
        }if(\Auth::user()->is_admin==1){
            /*$tests_count = \DB::table("test_service")->where("author","=",\Auth::user()->name)->count();
            $materials_count = \DB::table("materials")->where("author","=",\Auth::user()->name)->count();*/
            return view('Backend.AdminInterface.content.Dashboard.index');
    }
        $courses = \DB::table('courses')->whereJsonContains("students",\Auth::user()->name)->paginate(10);
        $courses_array = $courses->pluck("name")->toarray();
        $tests = \DB::table('test_service')->where(function($query) use ($courses_array){
            foreach ($courses_array as $course) {
                $query->orWhereJsonContains('activate_for',$course);
            }
        })->get();
        $materials = \DB::table('materials')->where(function($query) use ($courses_array){
            foreach ($courses_array as $course) {
                $query->orWhereJsonContains('class',$course);
            }
        })->get();


        return view('Backend.StudentInterface.content.Dashboard.index')->with("materials_count",count($materials))->with("tests_count",count($tests));

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
}
