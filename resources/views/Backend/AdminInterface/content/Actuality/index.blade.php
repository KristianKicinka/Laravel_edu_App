@extends('layouts.app')

@section('content')
    @if(Auth::user()->is_admin==1)


        <div class="window">
            @include('Backend.AdminInterface.sidebars.leftSidebar')
            <div class="main-content container-fluid">
                    @include('Backend.AdminInterface.content.Actuality.MainContent')
            </div>
        </div>
    @endif
@endsection
