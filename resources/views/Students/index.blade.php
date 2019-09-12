@extends('layouts.app')

@section('content')
    <div class="window">
        @include('Teacher.sidebars.teacherSidebar')
        <div class="main-content container-fluid">

            @if (Route::current()->getName() == 'teacherStudents')
                @include('Teacher.content.teacherStudents')
            @endif

        </div>
    </div>
@endsection
