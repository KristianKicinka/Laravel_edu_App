@extends('layouts.app-chat')

@section('content')

        <div class="window">
            @include('Backend.StudentInterface.sidebars.leftSidebar')
            <div class="main-content container-fluid">
                    @include('Backend.StudentInterface.content.Chat.MainContent')
            </div>
        </div>


@endsection
