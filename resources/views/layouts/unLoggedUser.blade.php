
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<nav class="navbar navbar-expand-md navbar-dark shadow-sm bg-dark " style="opacity: 80%">
    <div class="container-fluid">
        {{--<a class="navbar-brand font-roboto" href="{{ url('/') }}">
            {{ config('app.name', 'Edu-Portal SPSE-PO') }}
        </a>--}}
        <p class="text-light" style="{font-size: 17px; margin-top: auto}">
            <i class="material-icons" style="font-size:17px">phone_in_talk</i>
            +421 906 475 213
        </p>
        <p class="text-light px-5" style="font-size: 17px">
            <i class="material-icons" style="font-size:17px">email</i>
            example@example.com
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
                    <li class="nav-item active" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item active" style="{}" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"
                                                            >
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-md navbar-dark shadow-sm bg-dark " style="{border-top: 1px solid navajowhite; opacity: 70%;}">
    <div class="container-fluid">
        <button class="navbar-toggler colapse-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto nav-left-part">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto font-roboto nav-right-part" id="slide">
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

