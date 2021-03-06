@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_teacher==1)
        <div class="window">
            @include('Backend.TeacherInterface.sidebars.leftSidebar')
            <div class="main-content container-fluid">
                    @include('Backend.TeacherInterface.content.Materials.MainContent')
            </div>
        </div>
    @endif

    @if(Auth::user()->is_student==1)
        <h1>Študent</h1>
    @endif

    @if(Auth::user()->is_admin==1)
        <h1>Admin</h1>
    @endif
@endsection
