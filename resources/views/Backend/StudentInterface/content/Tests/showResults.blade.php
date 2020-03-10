@extends('layouts.app-test')

<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-orange py-2 ">
    <div class="container-fluid pt-1">
        <div class="text-center w-100">
            <h4 id="countdown" class="timer"></h4>
        </div>
    </div>
</nav>

@section('content')

    <?php
    use phpDocumentor\Reflection\Types\This;
    use App\Http\Controllers\TestsController;

    ?>

    <div class="window bg-">
        <div class="container mt-lg-5 py-lg-4 px-4 my-4 shadow  bg-white rounded ">

            <header class=" modal-header">
                <h1>{{ (json_decode($test_name,true)[0]) }}</h1>


            </header>

            {!! Form::open(["method"=>"get", "url"=>route('saveResaults',json_decode($test_id,true)[0]), 'id' => 'test_form']) !!}
            {{ csrf_field() }}
            <main class="modal-body">


                @foreach($questions as $question)
                    <div class="py-2">

                        <h3>{{ $question->question }}</h3>
                        <div style="display: none">  {{ $more_right_option = \DB::table("answers")
           ->join("questions","questions.id","=","answers.question_id")
           ->where('is_correct','=','1')
           ->where('question_id','=',$question->id)
           ->count()}}</div>

                        <div>
                          {{--  {{
                            $answers = \DB::table("student_answers")->where("user_id","=",\Auth::user()->id)->where("test_id","=",$id)->where(function($query) use ($questions_id){
                                foreach ($questions_id as $question_id) {
                                    $query->orWhere('question_id', $question_id);
                                }
                            })->get();

                            $points =0;
                            $point = 0;
                            $uncorrect =0;


                            foreach ($questions as $question){

                                foreach ($answers->where("question_id","=",$question->id)->where("test_id","=",$id) as $answer) {
                                    $correctAnswer = \DB::table("answers")->where("answer", "=", $answer->answer)->where("test_id","=",$id)->get();



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
                                    $points = $points+$point;
                                    $uncorrect = 0;
                                    $point = 0;
                                }
                            }

                           }}--}}
                        </div>

                        <div class="container py-2">
                            @foreach($options->where("question_id","=",$question->id) as $option)
                                <div class="custom-checkbox px-2 py-2" >
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">
                                            <input type="hidden" name="{{"checkboxVal_$question->id".'_'."$option->id" }}" value="0">
                                            {!! Form::checkbox("checkboxVal_$question->id".'_'."$option->id",1,false,["id"=>"checkbox_$question->id".'_'."$option->id","type"=>"checkbox",'disabled']) !!}
                                            @if($option->is_correct ==1)
                                            <label style="background-color: greenyellow" name="{{"labelVal_$question->id".'_'."$option->id" }}" value="{!! $option->answer !!}" for="{{ "checkbox_$question->id".'_'."$option->id" }}" >{{ $option->answer }}</label>
                                            @else
                                                <label name="{{"labelVal_$question->id".'_'."$option->id" }}" value="{!! $option->answer !!}" for="{{ "checkbox_$question->id".'_'."$option->id" }}" >{{ $option->answer }}</label>
                                            @endif
                                                <input type="hidden" name="{{"labelVal_$question->id".'_'."$option->id" }}" value="{!! $option->answer !!}">
                                            <input type="hidden" name="{{"option_id_$question->id".'_'."$option->id" }}" value="{!! $option->id !!}">


                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                @endforeach

            </main>
            <footer class="modal-footer">
                <div class="w-100 float-left">
                </div>
                <button class="btn btn-orange" onclick="window.close()">Zatvoriť</button>
            </footer>
            {!! Form::close() !!}
        </div>
    </div>
@endsection




