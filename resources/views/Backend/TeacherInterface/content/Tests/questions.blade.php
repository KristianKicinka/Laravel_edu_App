@extends('layouts.app')
@section('content')

    <?php
    use phpDocumentor\Reflection\Types\This;
    use App\Http\Controllers\TestsController;
    $testNameVal="";
    ?>

    <div class="window">
        @include('Backend.TeacherInterface.sidebars.teacherSidebar')
        <div class="main-content container-fluid">

            <header class="panel-head container-fluid py-3">
                <h1>Create new Test</h1>
            </header>

            <main class="panel-main-content">
                {{ Form::open(['method' =>"post","action"=>"TestsController@store"]) }}

                @for($index=1;$index<=$questions;$index++)
                    <div class="row">
                        <div class="container px-2 py-2 mx-3 my-2 shadow p-3 mb-5 bg-white rounded text-left d-inline-block ">
                            <div class="label form-group col-md-6">

                                    <h3>Question number {{ $index }}</h3>
                                    {{ Form::label("question_label_$index","Your question :") }}
                                    {{ Form::text("question_$index",null,['placeholder'=>" Type Question $index",'class'=>'form-control','autofocus'=>true,"required"=>true ]) }}

                                    <div class="options py-4">
                                        {{ Form::label("answer_label_$index","Your answers :") }}
                                        @for($i=1;$i<=$answers;$i++)
                                            <div class="option py-2">

                                                {{ Form::text("answer_$i",null,['placeholder'=>"Answer $i",'class'=>'form-control','autofocus'=>true,"required"=>true]) }}
                                            </div>
                                            <div class="checkbox float-left px-2 py-1">
                                                {!! Form::label('correct_'.$i,'Correct',['class'=>'control-label',"required"=>true]) !!}
                                                {!! Form::hidden('correct_'.$i,0) !!}
                                                {!! Form::checkbox('correct_'.$i,1,false,[]) !!}
                                            </div>

                                        @endfor


                                    </div>


                            </div>
                        </div>

                    </div>
                @endfor

                    <div class="row">
                        <div class="handler-button pt-2 pb-4 px-2 d-inline-block float-left ml-4">
                            {!!  Form::submit('Tests',['class'=>'btn btn-danger', ]) !!}
                        </div>
                    </div>
            {{ Form::close() }}
            </main>

        </div>
    </div>
@endsection



