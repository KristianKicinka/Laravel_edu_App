@extends('layouts.app')
@section('content')

<?php
use phpDocumentor\Reflection\Types\This;
use App\Http\Controllers\TestsController;

?>

    <div class="window">
        @include('Backend.TeacherInterface.sidebars.teacherSidebar')
        <div class="main-content container-fluid">

            <header class="panel-head container-fluid py-3">
                <h1>Create new Test</h1>
            </header>

            <main class="panel-main-content">

                <div class="row">
                    <div class="container px-2 py-2 mx-3 my-2 shadow p-3 mb-5 bg-white rounded text-left d-inline-block ">
                        <div class="label form-group col-md-6">
                            {{ Form::open(['method' =>"post","action"=>"TestsController@questions"]) }}
                            <h3>Basic info about test</h3>
                            <div class="test-name py-2">
                                {{ Form::label("testName","Tests") }}
                                {{ Form::text("testNameVal",null,['placeholder'=>" Set the test name",'class'=>'form-control', "required"=>"true",'autofocus'=>true ]) }}
                            </div>

                            <div class="test-questions py-2">
                                {{ Form::label("testQuestions","Count of questions") }}
                                {{ Form::number("testQuestionsVal",null,['placeholder'=>" Set count of Questions",'class'=>'form-control', "min"=>"1","required"=>"true",'autofocus'=>true ]) }}
                            </div>
                            <div class="test-options py-2">
                                {{ Form::label("testOptions","Count of options") }}
                                {{ Form::number("testOptionsVal",null,['placeholder'=>" Set count of Options",'class'=>'form-control', "min"=>"1","required"=>"true",'autofocus'=>true ]) }}

                                <div class="row py-2 d-block px-3">
                                    <div class="handler-buttons">
                                        <div class="hanlder-button  py-2">
                                            {!!  Form::submit('Next',['class'=>'btn btn-success','type'=>'submit',]) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                        {{ Form::close() }}
                    </div>

                </div>
            </main>
        </div>
    </div>
@endsection



