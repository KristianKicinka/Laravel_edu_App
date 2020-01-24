@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_teacher==1)
        <div class="window">
            @include('Backend.TeacherInterface.sidebars.leftSidebar')
            <div class="main-content container-fluid">
                    @include('Backend.TeacherInterface.content.Results.MainContent')
            </div>
        </div>
    @endif

@endsection
