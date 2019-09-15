@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_teacher==1)
        <div class="window">
            @include('Teacher.sidebars.teacherSidebar')
            <div class="main-content container-fluid">
                    @include('Teacher.content.teacherDashboard')
            </div>
        </div>
    @endif

    @if(Auth::user()->is_student==1)
        <h1>Student</h1>
    @endif

    @if(Auth::user()->is_admin==1)
        <h1>Admin</h1>
    @endif





@endsection