<?php

namespace App\Http\Controllers;

use App\Question;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.TeacherInterface.content.Tests.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = Input::get('testNameVal');
        $questions_count = Input::get('testQuestionsVal');
        $options_count = Input::get('testOptionsVal');
        return view('Backend.TeacherInterface.content.Tests.create')->with('name',$name)->with('questions_count',$questions_count)->with('options_count',$options_count);
    }

    public function questions(Request $request)
    {
        $test = new Test();
        $test->name = $request->input("name");
        $test->questions_count = $request->input("questions_count");
        $test->options_count = $request->input("options_count");
        $questions_count = $request->input("questions_count");
        $options_count = $request->input("options_count");


        for ($index=1;$index<=$questions_count;$index++){
        $question = new Question();

        }

       return view('Backend.TeacherInterface.content.Tests.questions')->with("questions",$questions_count)->with("answers",$options_count);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
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
    /*This function is used for adding more options in question*/


}
