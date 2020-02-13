<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SPSE Edu-portal') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">





    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <!--Summernote-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">

    <!--Main-->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">



</head>
<body onload="display_ct();" >
    <div id="app">
        @if(Auth::check())
            @include('layouts.loggedUserNavbar')
        @else
            @include('layouts.unLoggedUser')
        @endif

        <main >
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->

    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    @if (count($errors) > 0)
        <script>
            $( document ).ready(function() {
                $('#myModal').modal('toggle');
            });
        </script>
    @endif

    {{--Select 2 plugin--}}



    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js" defer></script>

    <script src="{{ asset('js/main.js') }}" defer></script>

    <script>
        function display_c(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct()',refresh)
        }

        function display_ct() {
            var x = new Date()
            // date part ///
            var month=x.getMonth()+1;
            var day=x.getDate();
            var year=x.getFullYear();
            if (month <10 ){month='0' + month;}
            if (day <10 ){day='0' + day;}
            var x3= day+'.'+month+'.'+year;

            // time part //
            var hour=x.getHours();
            var minute=x.getMinutes();
            var second=x.getSeconds();
            if(hour <10 ){hour='0'+hour;}
            if(minute <10 ) {minute='0' + minute; }
            if(second<10){second='0' + second;}
            var x3 = x3 + ' ' +  hour+':'+minute+':'+second
            if(window.location.href=="{!! $url = route('Dashboard'); !!}"|| window.location.href=="{!! $url = url("/home"); !!}" ){
                document.getElementById('ct').innerHTML = x;
                display_c();
            }

        }
    </script>


</body>
</html>
