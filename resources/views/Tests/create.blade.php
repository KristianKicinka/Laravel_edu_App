@extends('layouts.app')
@section('content')

<?php
use phpDocumentor\Reflection\Types\This;
use App\Http\Controllers\TestsController;

?>

    <div class="window">
        @include('Teacher.sidebars.teacherSidebar')
        <div class="main-content container-fluid">

            <header class="panel-head container-fluid py-3">
                <h1>Create new Test</h1>
            </header>

            <main class="panel-main-content">

                <div class="row">
                    <div class="container px-2 py-2 mx-3 my-2 shadow p-3 mb-5 bg-white rounded text-left d-inline-block ">
                        <div class="label form-group col-md-6">
                            <h3>Question {{ isset($index) }}</h3>
                            <div class="question">
                                {{ Form::text("question_$index",null,['placeholder'=>" Type Question $index",'class'=>'form-control', ]) }}
                            </div>
                            <div class="options py-4">
                                @for($i=0;$i<$answers;$i++)
                                    <div class="option py-2">
                                        {{ Form::text("answer_$i",null,['placeholder'=>"Answer $i",'class'=>'form-control',]) }}
                                    </div>
                                    <div class="checkbox float-left px-2 py-1">
                                        {!! Form::label('correct_'.$i,'Correct',['class'=>'control-label']) !!}
                                        {!! Form::hidden('correct_'.$i,0) !!}
                                        {!! Form::checkbox('correct_'.$i,1,false,[]) !!}
                                    </div>
                                @endfor
                            </div>
                            <div class="handler py-2">
                                <div class="form-group">
                                    <div class="row py-2 d-block">
                                        <div class="handler-buttons">
                                            <div class="hanlder-button px-2 ml-2 py-2">
                                                {!!  Form::button('Save',['class'=>'btn btn-success','type'=>'submit',]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="handler-button pt-4 px-2 d-inline-block float-left ml-2 ml-2">
                                            {!!  Form::button('Back',['class'=>'btn btn-danger', ]) !!}
                                        </div>

                                        <div class="handler-button pt-4 px-2 d-inline-block float-right ml-2">
                                            {!!  Form::button('Next',['class'=>'btn btn-primary',]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
@endsection



