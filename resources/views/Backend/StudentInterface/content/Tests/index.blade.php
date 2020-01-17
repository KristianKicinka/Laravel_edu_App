@extends('layouts.app')

@section('content')

        <div class="window">
            @include('Backend.StudentInterface.sidebars.leftSidebar')
            <div class="main-content container-fluid">
                    @include('Backend.StudentInterface.content.Tests.MainContent')
            </div>
        </div>




@endsection

