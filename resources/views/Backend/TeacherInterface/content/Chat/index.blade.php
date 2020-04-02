@extends('layouts.app')

@section('content')

        <div class="window">
            @include('Backend.TeacherInterface.sidebars.leftSidebar')
            <div class="main-content container-fluid">
                    @include('Backend.TeacherInterface.content.Chat.MainContent')
            </div>
        </div>


@endsection
