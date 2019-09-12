@extends('layouts.app')

@section('content')
    <div class="window">
        @include('Teacher.sidebars.teacherSidebar')
        <div class="main-content container-fluid">

            @if (Route::current()->getName() == 'teacherClassrooms')
                @include('Teacher.content.teacherClassrooms')
            @endif

        </div>
    </div>
@endsection