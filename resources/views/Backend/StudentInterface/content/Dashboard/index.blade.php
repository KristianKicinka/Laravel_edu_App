@extends('layouts.app')

@section('content')
        <div class="window">
            @include('Backend.StudentInterface.sidebars.leftSidebar')
            <div class="main-content container-fluid">
                    @include('Backend.StudentInterface.content.Dashboard.MainContent')
            </div>
        </div>
@endsection
