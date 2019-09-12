@extends('layouts.app')

@section('content')
    <div class="window">
        @include('Teacher.sidebars.teacherSidebar')
        <div class="main-content container-fluid">

            @if (Route::current()->getName() == 'teacherSettings')
                @include('Teacher.content.teacherSettings')
            @endif

        </div>
    </div>
@endsection
