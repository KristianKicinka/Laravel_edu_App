@extends('layouts.app')
@section('content')

    <?php
    use phpDocumentor\Reflection\Types\This;
    use App\Http\Controllers\TestsController;
    ?>

    <div class="window">
        @include('Backend.TeacherInterface.sidebars.leftSidebar')
        <div class="main-content container-fluid">

            <header class="panel-head container-fluid py-3">
                <h1>Vytvoriť nový test</h1>
            </header>

            <main class="panel-main-content">
                {{ Form::open(['method' =>"post","action"=>"TestsController@store"]) }}
                    {!! Form::hidden("name",$name) !!}
                    {!! Form::hidden("questions_count",$questions_count) !!}
                    {!! Form::hidden("options_count",$options_count) !!}
                    {!! Form::hidden("current_user",Auth::user()->name) !!}
                @for($index=1;$index<=$questions_count;$index++)
                    <div class="row">
                        <div class="container px-2 py-2 mx-3 my-2 shadow p-3 mb-5 bg-white rounded text-left d-inline-block ">
                            <div class="label form-group col-md-6">

                                    <h3>Otázka číslo {{ $index }}</h3>
                                    {{ Form::label("question_label_$index","Vaša otázka:") }}
                                    {{ Form::text("question_$index",null,['placeholder'=>" Zadajte otázku $index",'class'=>'form-control','autofocus'=>true,"required"=>true ]) }}

                                    <div class="options py-4">
                                        {{ Form::label("answer_label_$index","Vaša odpoveď:") }}
                                        @for($i=1;$i<=$options_count;$i++)
                                            <div class="option py-2">

                                                {{ Form::text("answer_".$index.$i,null,['placeholder'=>"Odpoveď $i",'class'=>'form-control','autofocus'=>true,"required"=>true]) }}
                                            </div>
                                            <div class="checkbox float-left px-2 py-1">
                                                {!! Form::label('correct_'.$i,'Správna',['class'=>'control-label',"required"=>true]) !!}
                                                {!! Form::hidden('correct_'.$index.$i,0) !!}
                                                {!! Form::checkbox('correct_'.$index.$i,1,false,[]) !!}
                                            </div>

                                        @endfor


                                    </div>


                            </div>
                        </div>

                    </div>
                @endfor

                    <div class="row">
                        <div class="handler-button pt-2 pb-4 px-2 d-inline-block float-left ml-4">
                            {!!  Form::submit('Uložiť test',['class'=>'btn btn-orange', ]) !!}
                        </div>
                    </div>
            {{ Form::close() }}
            </main>

        </div>
    </div>
@endsection



