@extends('layouts.app')

@section('content')
<div class="window">
@include('Teacher.sidebars.teacherSidebar')
    <div class="main-content container-fluid">
        @if (Route::current()->getName() == 'teacherDashboard')
                @include('Teacher.content.teacherDashboard')
        @endif
            @if (Route::current()->getName() == 'teacherSettings')
                <h1>Teacher Settings</h1>
            @endif
            @if (Route::current()->getName() == 'teacherTests')
                <h1>Teacher Tests</h1>
            @endif

            @if (Route::current()->getName() == 'teacherMaterials')
                <h1>Teacher Materials</h1>
            @endif

            @if (Route::current()->getName() == 'teacherStudents')
                <h1>Teacher Students</h1>
            @endif
            @if (Route::current()->getName() == 'teacherClassrooms')
                <h1>Teacher classrooms</h1>
            @endif
            @if (Route::current()->getName() == 'teacherSubjects')
                <h1>Teacher Subjects</h1>
            @endif
    </div>
</div>
@endsection
