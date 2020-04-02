@extends('layouts.app')

@section('content')

        <div class="window">
            @include('Backend.AdminInterface.sidebars.leftSidebar')
            <div class="main-content container-fluid">
                    @include('Backend.AdminInterface.content.Chat.MainContent')
            </div>
        </div>


@endsection
