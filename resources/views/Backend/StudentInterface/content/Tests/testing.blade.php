@extends('layouts.app-test')

<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-orange py-2 ">
    <div class="pl-xl-5" style="{display: inline-block; float: left}">{{Auth::user()->name}}</div>
    <div class="container-fluid pt-1">

        <div class="text-center w-100">
            <h4 id="countdown" class="timer" style="display: inline-block"></h4>
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
                        @if($more_right_option > 1)
                            <div class="alert alert-warning" role="alert">
                                V tejto otázke je viac správnych odpovedí
                            </div>
                        @endif
                        <div class="container py-2">
                            @foreach($options->where("question_id","=",$question->id) as $option)
                                <div class="custom-checkbox px-2 py-2" >
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">
                                            <input type="hidden" name="{{"checkboxVal_$question->id".'_'."$option->id" }}" value="0">
                                            {!! Form::checkbox("checkboxVal_$question->id".'_'."$option->id",1,false,["id"=>"checkbox_$question->id".'_'."$option->id","type"=>"checkbox"]) !!}
                                            <label name="{{"labelVal_$question->id".'_'."$option->id" }}" value="{!! $option->answer !!}" for="{{ "checkbox_$question->id".'_'."$option->id" }}" >{{ $option->answer }}</label>
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
                <button type="submit" class="btn btn-orange">Ukončiť test</button>
            </footer>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

<script>
       var seconds = parseInt({!! $duration !!})*60;
       function secondsPassed() {
           var minutes = Math.round((seconds-30)/60);
           var rem_seconds = seconds % 60;
           if (rem_seconds<10){
               rem_seconds = "0"+rem_seconds;
           }
           document.getElementById('countdown').innerHTML = minutes+":"+rem_seconds;

           if (seconds==0){
               clearInterval(countdownTimer);
               document.getElementById("test_form").submit();
              /* document.getElementById('countdown').innerHTML = "Mission Failed!";*/
           }else {
               seconds--;
           }
       }
       var countdownTimer = setInterval('secondsPassed()',1000);


    function disable_f5(e)
    {
        if ((e.which || e.keyCode) == 116)
        {
            e.preventDefault();
        }
    }

    $(document).ready(function(){
        $(document).bind("keydown", disable_f5);
    });
</script>



