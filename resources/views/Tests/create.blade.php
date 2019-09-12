<?php

use phpDocumentor\Reflection\Types\This;

 $index=1;
 $end=false;
 $options=2;
 function moreOptions($options){
     $options++;
     return view('Tests.create')->with('$options',$options);
 }

?>
@extends('layouts.app')
@section('content')
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
                            <h3>Question {{ $index }}</h3>
                            <div class="question">
                                {{ Form::text("question_$index",null,[
                                    'placeholder'=>" Type Question $index ",
                                    'class'=>'form-control',
                                ]) }}
                            </div>
                            <div class="options py-4">
                                @for($i=0;$i<$options;$i++)
                                    <div class="option py-2">
                                        {{ Form::text("option_$i",null,[
                                    'placeholder'=>"Option $i",
                                    'class'=>'form-control',
                                    ]) }}
                                    </div>
                                @endfor
                            </div>
                            <div class="handler py-4">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="handler-buttons">
                                            <div class="hanlder-button px-2 d-inline-block ml-2">
                                                {!!  Form::button('Save',[
                                            'class'=>'btn btn-primary',
                                             'type'=>'submit',

                                         ]) !!}
                                            </div>

                                            <div class="handler-button px-2 d-inline-block">
                                                {!!  Form::button('+ Question',[
                                                'class'=>'btn btn-secondary',

                                             ]) !!}
                                            </div>

                                            <div class="handler-button px-2 d-inline-block">
                                                {!!  Form::button('+ Option',[
                                               'class'=>'btn btn-success',
                                               'onclick'=>"function (){

                                               }",

                                            ]) !!}
                                            </div>

                                            <div class="handler-button px-2 d-inline-block">
                                                {!!  Form::button('Back',[
                                               'class'=>'btn btn-danger',

                                            ]) !!}
                                            </div>
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



