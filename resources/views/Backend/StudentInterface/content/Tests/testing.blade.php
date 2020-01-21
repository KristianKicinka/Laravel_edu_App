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
                {{ json_decode($duration,true)[0]}}
            </header>

            {!! Form::open(["method"=>"post", "url"=>route('Testing',0)]) !!}
            <main class="modal-body">


                @foreach($questions as $question)
                    <div>

                        <h3>{{ $question->question }}</h3>
                        <div class="container py-2">
                            @foreach($options->where("question_id","=",$question->id) as $option)
                                <div class="custom-checkbox px-2 py-2" >
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">

                                            <input type="checkbox" name="checkbox" id="{{ "checkbox_$question->id._.$option->id" }}" />
                                            <label for="{{ "checkbox_$question->id._.$option->id" }}">{{ $option->answer }}</label>

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
                    {{ $questions->links() }}
                </div>
                <button type="submit" class="btn btn-orange">Finish Test</button>
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
               document.getElementById('countdown').innerHTML = "Mission Failed!";
           }else {
               seconds--;
           }
       }
       var countdownTimer = setInterval('secondsPassed()',1000);


</script>



