@extends('layouts.app-test')

<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-orange py-2 ">
    <div class="container-fluid pt-1">
        <div class="text-center w-100">
            <h4>The test is complete</h4>
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
                <h1>Results</h1>
            </header>

            {{--{!! Form::open(["method"=>"get", "url"=>route('saveResaults',json_decode($test_id,true)[0])]) !!}--}}
            {{csrf_field()}}
            <main class="modal-body">

                <div class="row">
                    <div class="col-md-6">

                        <ul class="list-group ">
                            <li class="list-group-item">Your points : {{ $points }}</li>
                            <li class="list-group-item">Max points : {{ $max_points }}</li>
                            <li class="list-group-item">Percentage : {{ round(($points/$max_points)*100 )}} %</li>
                        </ul>
                        <button class="btn btn-orange mx-2 my-3" onclick="window.close()">Close</button>
                    </div>
                    <div class="col-md-6">
                        <h2>Score chart</h2>
                        <div class="card rounded">
                            <div class="card-body py-3 px-3">
                                {!! $resaultGraph->container() !!}

                            </div>
                        </div>
                        {!! $resaultGraph->script() !!}
                    </div>
                </div>
            </main>
            <footer class="modal-footer">
                <div class="w-100 float-left">
                </div>
                {{--<button type="submit" class="btn btn-orange">Finish Test</button>--}}
            </footer>
           {{-- {!! Form::close() !!}--}}
        </div>
    </div>
@endsection

<script>
       var seconds = 12*60;
       function secondsPassed() {
           var minutes = Math.round((seconds-30)/60);
           var rem_seconds = seconds % 60;
           if (rem_seconds<10){
               rem_seconds = "0"+rem_seconds;
           }
           /*document.getElementById('countdown').innerHTML = minutes+":"+rem_seconds;*/

           if (seconds==0){
               clearInterval(countdownTimer);
              /* document.getElementById('countdown').innerHTML = "Mission Failed!";*/
           }else {
               seconds--;
           }
       }
       var countdownTimer = setInterval('secondsPassed()',1000);


</script>



