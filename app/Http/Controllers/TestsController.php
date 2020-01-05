<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Test;
use App\TestService;
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

        $user = \Auth::user()->name;
        $tests = \DB::table("tests")->where("author","=",$user)->paginate(10);
        $courses = \DB::table("courses")->paginate(10);
        return view('Backend.TeacherInterface.content.Tests.index',compact("tests"))->with("courses",$courses);
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
        $test->author = $request->input("current_user");

        $test->save();

        for ($index=1;$index<=$questions_count;$index++){
            $question = new Question();
            $question_question = $request->input("question_$index");
            $question->question = $question_question;
            $test_ID =  \DB::table("tests")->select("id")->where("name","=",$name)->pluck("id");
            $test_ID = json_decode($test_ID);
            $question->test_id = $test_ID[0];

            $question->points = 1;

            $question->save();

            for ($i=1;$i<=$options_count;$i++){
                $answer = new Answer();
                $answer_ID = \DB::table("questions")->select("id")->where("question","=",$question_question)->pluck("id");
                $answer_ID = json_decode($answer_ID);
                $answer->question_id = $answer_ID[0];

                $answer->answer = $request->input("answer_".$index.$i);
                $answer->is_correct = $request->input('correct_'.$index.$i);

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
        $questions = \DB::table("questions")->where("test_id","=",$id)->paginate(10);
        $answers = \DB::table("answers")->paginate(10);
        /*return view('Backend.TeacherInterface.content.Tests.index')->with("questions",$questions)->with("answers",$answers);*/
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

    public function activate($id){
        $testService = new TestService();
        $test_id = $id;
        $duration = Input::post("duration_val");
        $percentage = Input::post("percentage_val");
        $expiration = Input::post("expiration_val");
        $activate_for = json_encode(Input::post("coursesArray"));

        $testService->test_id = $test_id;
        $testService->duration = $duration;
        $testService->percentage = $percentage;
        $testService->expiration = $expiration;
        $testService->activate_for = $activate_for;

        $testService->save();
        \DB::table("tests")->where("id","=",$test_id)->update(["is_active"=>true]);

        return \Redirect::route("Tests");

    }

}
