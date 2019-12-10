<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = \DB::table("tests")->paginate(10);
        return view('Backend.TeacherInterface.content.Tests.index',compact("tests"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.TeacherInterface.content.Tests.create');
    }

    public function questions(Request $request)
    {
        $name = $request->input("testNameVal");
        $questions_count = $request->input("testQuestionsVal");
        $options_count = $request->input("testOptionsVal");
       return view('Backend.TeacherInterface.content.Tests.questions')->with("questions_count",$questions_count)->with("options_count",$options_count)->with("name",$name);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = new Test();
        $name = $request->input("name");
        $questions_count = $request->input("questions_count");
        $options_count = $request->input("options_count");

        $test->name = $name;
        $test->questions_count = $questions_count;
        $test->options_count = $options_count;

        $test->save();

        for ($index=1;$index<=$questions_count;$index++){
            $question = new Question();
            $question_question = $request->input("question_$index");
            $question->question = $question_question;
            $question->test_id =(integer) json_decode( \DB::table("tests")->select("id")->where("name","=",$name)->pluck("id"));
            $question->points = 1;

            $question->save();

            for ($i=1;$i<=$options_count;$i++){
                $answer = new Answer();
                $answer->question_id = (integer) json_decode(\DB::table("questions")->select("id")->where("question","=",$question_question)->pluck("id"));
                $answer->answer = $request->input("answer_$i");
                $answer->is_correct = $request->input('correct_'.$i);

                $answer->save();

            }

        }

        return \Redirect::route("Tests");

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
