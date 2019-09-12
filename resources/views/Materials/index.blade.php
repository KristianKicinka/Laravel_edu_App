@extends('layouts.app')

@section('content')
    <div class="window">
        @include('Teacher.sidebars.teacherSidebar')
        <div class="main-content container-fluid">

            @if (Route::current()->getName() == 'teacherMaterials')
                @include('Teacher.content.teacherMaterials')
            @endif

        </div>
    </div>
@endsection
