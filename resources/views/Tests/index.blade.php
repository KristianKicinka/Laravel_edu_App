@extends('layouts.app')

@section('content')
    <div class="window">
        @include('Teacher.sidebars.teacherSidebar')
        <div class="main-content container-fluid">

            @if (Route::current()->getName() == 'teacherTests')
                @include('Teacher.content.teacherTests')
            @endif

        </div>
    </div>
@endsection