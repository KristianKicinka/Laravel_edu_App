@extends('layouts.app')

@section('content')
<div class="window">
@include('Teacher.sidebars.teacherSidebar')
    <div class="main-content container-fluid">
        @if (Route::current()->getName() == 'teacherDashboard')
                @include('Teacher.content.teacherDashboard')
        @endif
            @if (Route::current()->getName() == 'teacherSettings')
                @include('Teacher.content.teacherSettings')
            @endif
            @if (Route::current()->getName() == 'teacherTests')
                @include('Teacher.content.teacherTests')
            @endif

            @if (Route::current()->getName() == 'teacherMaterials')
                @include('Teacher.content.teacherMaterials')
            @endif

            @if (Route::current()->getName() == 'teacherStudents')
                @include('Teacher.content.teacherStudents')
            @endif
            @if (Route::current()->getName() == 'teacherClassrooms')
                @include('Teacher.content.teacherClassrooms')
            @endif
            @if (Route::current()->getName() == 'teacherSubjects')
                @include('Teacher.content.teacherSubjects')
            @endif
    </div>
</div>
@endsection
