@extends('layouts.app')

@section('content')
    <div class="window">
        @include('Teacher.sidebars.teacherSidebar')
        <div class="main-content container-fluid">

            @if (Route::current()->getName() == 'teacherSubjects')
                @include('Teacher.content.teacherSubjects')
            @endif

        </div>
    </div>
@endsection
