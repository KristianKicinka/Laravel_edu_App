@extends('layouts.app-test')
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

            {!! Form::open(["method"=>"post", "url"=>route('Testing',0)]) !!}
            <main class="modal-body">

                <?php $i=0 ?>
                @foreach($questions as $question)
                    <div>

                        <h3>{{ $question->question }}</h3>
                        <div class="container py-2">
                            @for($index=0;$index<count($options->where("question_id","=",$question->id));$index++)
                                <div class="custom-checkbox px-2 py-2" >
                                    <div class="funkyradio">
                                        <div class="funkyradio-primary">

                                            <input type="checkbox" name="checkbox" id="{{ "checkbox_$i'_'$index" }}" />
                                            <label for="{{ "label_$i'_'$index" }}">{{ $options[$index]->answer }}</label>

                                        </div>
                                    </div>
                                </div>

                            @endfor
                        </div>
                    </div>
                    <?php $i++ ?>
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



