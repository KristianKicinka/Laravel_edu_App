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
            Plzenská 1, Prešov
        </p>
        <p class="text-light px-5" style="font-size: 14px">
            <i class="fas fa-phone-square" style="font-size: 17px"></i>
            <a style="color: white;" href="tel:+421 911 369 367">+421 911 369 367</a>
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
                        <a class="nav-link" href="{{ route('login') }}" style="color: white">{{ __('Prihlásiť') }}</a>

                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item active" style="{margin-right: 1%; margin-top: 3%;}" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                            <a class="nav-link" href="{{ route('register') }}" style="color: white">{{ __('Registrovať') }}</a>
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
                    </li>
                @endguest
                <p class="text-light px-5" style="{font-size: 14px; border-left: 1px solid white; padding-left: 1%;padding-top: 2%;padding-bottom: 2%;}">
                    <i class="fas fa-search"></i>
                </p>
            </ul>
        </div>
    </div>
</nav>
