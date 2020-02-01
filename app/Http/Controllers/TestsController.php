<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Charts\TestResault;
use App\Question;
use App\Result;
use App\StudentAnswer;
use App\Test;
use App\TestService;
use ConsoleTVs\Charts\ChartsServiceProvider;
use ConsoleTVs\Charts\Classes\C3\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use ConsoleTVs\Charts;
use function MongoDB\BSON\toJSON;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->is_teacher==1) {
            $user = \Auth::user()->name;
            $tests = \DB::table("tests")->where("author", "=", $user)->paginate(10);
            $courses = \DB::table("courses")->paginate(10);
            return view('Backend.TeacherInterface.content.Tests.index', compact("tests"))->with("courses", $courses);
        }

        /*$user = \Auth::user()->name;*/
        $courses = \DB::table('courses')->select("name")->whereJsonContains("students",\Auth::user()->name);
        $courses=$courses->pluck('name')->toArray();

        $tests = \DB::table('tests')
                ->join('test_service', 'test_service.test_id', '=', 'tests.id')
                ->join('results','results.test_id','=','tests.id')
                ->where("results.user_id","=",\Auth::user()->id)
                ->where("tests.is_active","=",1 and function($query) use ($courses){
                        foreach ($courses as $course) {
                            $query->orWhereJsonContains('test_service.activate_for',$course);
                        }
                    })->paginate(10);

        return view('Backend.StudentInterface.content.Tests.index',compact("tests"))->with("courses",$courses);
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
        \DB::table("answers")
            ->join("questions","questions.id","=","answers.question_id")
            ->where("questions.test_id","=",$id)->delete();
        \DB::table("questions")->where("questions.test_id","=",$id)->delete();
        \DB::table("results")->where("test_id","=",$id)->delete();
        \DB::table("test_service")->where("test_id","=",$id)->delete();
        \DB::table("student_answers")->where("test_id","=",$id)->delete();
        \DB::table("tests")->where("id","=",$id)->delete();

        return \Redirect::route("Tests");


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

        /*Creating results table*/

        $max_points = \DB::table("answers")
            ->select("answers.is_correct")
            ->join("questions","questions.id","=","answers.question_id")
            ->join("tests","tests.id","=","questions.test_id")
            ->where("tests.id","=",$test_id)
            ->where("answers.is_correct","=",1)->count();

        $studentArray = json_decode($activate_for);
       /* dd($studentArray);*/

        $students = \DB::table('courses')
            ->select("courses.students")
            ->where( function($query) use ($studentArray){
                    foreach ($studentArray as $activate) {
                        $query->where('courses.name',"=",$activate);
                    }
                })->get();
        $students = json_decode($students,true)[0];
        $students = json_decode($students["students"],true);


        foreach ($students as $student){
            $result = new Result();
            $result->user_id = \DB::table("users")->where("name","=",$student)->pluck("id")[0];
            $result->test_id = $test_id;
            $result->points = 0;
            $result->max_points = $max_points;
            $result->percentage = 0;

            $result->save();
        }





        return \Redirect::route("Tests");

    }

    public function testing($id){
        $test_id = \DB::table("tests")->where("id","=",$id)->pluck("id");
        $test_name = \DB::table("tests")->where("id","=",$id)->pluck("name");
        $questions = \DB::table("questions")->where("test_id","=",$test_id)->get();
        $questions_id = \DB::table("questions")->where("test_id","=",$test_id)->pluck("id");
        $questions_count = \DB::table("tests")->where("id","=",$test_id)->pluck("questions_count");
        $options_count = \DB::table("tests")->where("id","=",$test_id)->pluck("options_count");
        $duration = \DB::table("test_service")->where("test_id","=",$test_id)->pluck("duration");

        $options = \DB::table("answers")->where(function($query) use ($questions_id){
            foreach ($questions_id as $question_id) {
                $query->orWhere('question_id', $question_id);
            }
            })->get();








        return view("Backend.StudentInterface.content.Tests.testing")
            ->with("test_id",$test_id)
            ->with("test_name",$test_name)
            ->with("questions",$questions)
            ->with("questions_id",$questions_id)
            ->with("options",$options)
            ->with("duration",$duration)
            ->with("questions_count",$questions_count)
            ->with("options_count",$options_count);
    }

    public function saveResaults($id){

        /*Saving to db*/
        $user = \Auth::user();
        $questions = \DB::table("questions")->where("test_id","=",$id)->get();
        $questions_id = \DB::table("questions")->where("test_id","=",$id)->pluck("id");
        $options = \DB::table("answers")->where(function($query) use ($questions_id){
            foreach ($questions_id as $question_id) {
                $query->orWhere('question_id', $question_id);
            }
        })->get();


        foreach ($questions as $question){
            foreach ($options->where("question_id","=",$question->id) as $option){
                $studentAnswer = new StudentAnswer();
                $studentAnswer->user_id = $user->id;
                $studentAnswer->test_id = $id;
                $studentAnswer->answer_id = Input::get("option_id_$question->id".'_'."$option->id");
                $studentAnswer->question_id = $question->id;
                $studentAnswer->answer = Input::get("labelVal_$question->id".'_'."$option->id");
                $studentAnswer->is_checked = Input::get("checkboxVal_$question->id".'_'."$option->id");
                if ($studentAnswer->is_checked == 1){
                    $student_answ_table = \DB::table("student_answers")
                        ->where("user_id","=",$studentAnswer->user_id)
                        ->where("test_id","=",$studentAnswer->test_id)
                        ->where("answer_id","=",$studentAnswer->answer_id)->first();
                    if(!$student_answ_table){
                        $studentAnswer->save();
                    }else{
                        \DB::table("student_answers")
                            ->where("user_id","=",$studentAnswer->user_id)
                            ->where("test_id","=",$studentAnswer->test_id)
                            ->delete();
                        $studentAnswer->save();


                    }

                }
            }
        }
        /*Generating resaults*/
        $answers = \DB::table("student_answers")->where(function($query) use ($questions_id){
            foreach ($questions_id as $question_id) {
                $query->orWhere('question_id', $question_id);
            }
        })->get();
        $points =0;
        $point = 0;
        $uncorrect =0;


        foreach ($questions as $question){

            foreach ($answers->where("question_id","=",$question->id) as $answer) {
                $correctAnswer = \DB::table("answers")->where("answer", "=", $answer->answer)->get();



                if ($correctAnswer[0]->id == $answer->answer_id && $correctAnswer[0]->is_correct==0){
                    $uncorrect++;

                }
                if ($correctAnswer[0]->id == $answer->answer_id && $correctAnswer[0]->is_correct==1){
                    $point++;
                }
                }
            /*dd($uncorrect);*/
            if ($uncorrect>0){
                $uncorrect = 0;
                $point = 0;
            }
            else{
                $points= $points+$point;
                $uncorrect = 0;
                $point = 0;
            }
            }
        $opt = $options->where("is_correct","=",1);
        $max_points = count($opt);

        $fillColors = [
            "rgba(255, 158, 48, 0.8)",
            "rgba(29,56,89, 0.8)",


        ];
        $percentage = round($points/$max_points*100);
        $resaultGraph = new TestResault();
        $resaultGraph->minimalist(false);
        $resaultGraph->labels(["correct answers (%)","incorrect answers (%)"]);
        $resaultGraph->dataset("Count of percents","pie",[$percentage,100-$percentage])->backgroundcolor($fillColors);



        /*Saving data to results*/
            \DB::table("results")
                ->where("user_id","=",$user->id)
                ->where("test_id","=",$id)
                ->update(["points"=>$points,"percentage"=>$percentage]);





        return view("Backend.StudentInterface.content.Tests.resaults")->with("points",$points)->with("max_points",$max_points)->with('resaultGraph',$resaultGraph);
    }

}
