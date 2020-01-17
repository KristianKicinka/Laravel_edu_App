<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<nav class="navbar navbar-expand-md navbar-blue shadow-sm bg-blue " style="{opacity: 80%; text-align: center;}">
    <div class="container-fluid">
        {{--<a class="navbar-brand font-roboto" href="{{ url('/') }}">
            {{ config('app.name', 'Edu-Portal SPSE-PO') }}
        </a>--}}
        <p class="text-light" style="{font-size: 14px; margin-top: auto; border-right: 1px solid white; padding-right: 1%;}">
            slovak
        </p>
        <p class="text-light" style="{font-size: 14px; margin-top: auto; margin-left: 1%;}">
            english
        </p>
        <p class="text-light" style="{font-size: 14px; margin-top: auto; margin-left: 32%;}">
            {{--<i class="fas fa-map-marked" style="font-size: 17px"></i>--}}
            <i class="fas fa-map-marker-alt" style="{font-size: 17px;}"></i>
            Ľubovnianska 22, Stará Ľubovňa
        </p>
        <p class="text-light px-5" style="font-size: 14px">
            <i class="fas fa-phone-square" style="font-size: 17px"></i>
            +421 905 589 555
        </p>
        <button class="navbar-toggler colapse-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto nav-left-part">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto font-roboto nav-right-part">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item active" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';" style="margin-top: 3%;">
                        <a class="nav-link" href="{{ route('login') }}" style="color: white">{{ __('Login') }}</a>

                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item active" style="{margin-right: 1%; margin-top: 3%;}" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                            <a class="nav-link" href="{{ route('register') }}" style="color: white">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" id="logout-button" style="color:black" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>ho
                @endguest
                <p class="text-light px-5" style="{font-size: 14px; border-left: 1px solid white; padding-left: 1%;padding-top: 2%;padding-bottom: 2%;}">
                    <i class="fas fa-search"></i>
                </p>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-md shadow-sm " style="{border-top: 1px solid navajowhite; opacity: 70%; width: 200%; background-color:white; position: fixed;}" id="slide" >
    <div class="container-fluid">
        <button class="navbar-toggler colapse-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto nav-left-part">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto font-roboto nav-right-part" style="{position: absolute; color: #112134;}">
                <!-- Authentication Links -->

                    <li class="nav-item active" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                        <a class="nav-link" href="">Home</a>
                    </li>

                        <li class="nav-item active" style="{}" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"
                        >
                            <a class="nav-link" href="">About</a>
                        </li>
                    <li class="nav-item active" style="{}" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"
                    >
                        <a class="nav-link" href="">More</a>
                    </li>

                    <li class="nav-item active" style="{}" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"
                    >
                        <a class="nav-link" href="">More</a>
                    </li>


            </ul>
        </div>
    </div>
</nav>

<script>
    $(document).ready(function(){
            $("#slide").animate({
                right:'0%'
                //height:'100px',
            },1000);
    });
</script>

