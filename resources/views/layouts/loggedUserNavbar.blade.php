
    <ul class="user-nav">
        <li class="pl-4">{{ Auth::user()->name }}</li>
        <li class="float-right pr-4" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';"><a class="text-light" style="cursor: pointer;" href="{{ route('logout') }}"
                onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
                {{ __('Odhlásiť') }}
            </a></li>
    </ul>





<nav class="navbar navbar-expand-md navbar-light shadow-sm panel-navbar">
    <div class="container-fluid top-menu-container">
        <div class="col-sm-2 logo-panel text-center">
            <a class="navbar-brand font-roboto" href="">
                {{ config('app.name', 'Edu-Portal SPSE-PO') }}
            </a>
        </div>

        <button class="navbar-toggler colapse-menu hamburger" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse text-center navbar-user" id="navbarNav">
            <ul class="navbar-nav ml-auto font-roboto nav-right-part font-weight-bold user-navbar-nav">
                @if(Auth::user()->is_teacher==1)
                    <li><a class="nav-link" href="{{ route('Dashboard') }}"><i class="fa fa-fw fa-home text-left sidebar-icon" ></i> Domov</a></li>
                    <li><a class="nav-link" href="{{ route('Settings') }}"><i class="fas fa-cogs text-left sidebar-icon" ></i> Nastavenia</a></li>
                    <li><a class="nav-link" href="{{ route('Tests') }}"><i class="far fa-clipboard text-left sidebar-icon"></i>Testy</a></li>
                    <li><a class="nav-link" href="{{ route('Results') }}"><i class="fas fa-receipt text-left sidebar-icon" ></i> Výsledky testov</a></li>
                    <li><a class="nav-link" href="{{ route('Materials') }}"><i class="fas fa-book text-left sidebar-icon" ></i> Materiály</a></li>
                    {{--<li><a class="left-sidebar-link" href="{{ route('Students') }}"><i class="fas fa-user-graduate text-left sidebar-icon" ></i> Students</a></li>--}}
                    <li><a class="nav-link" href="{{ route('Classrooms') }}"><i class="fas fa-chalkboard-teacher text-left sidebar-icon" ></i> Kurzy</a></li>
                    <li><a class="nav-link" href="{{ route('Chat') }}"><i class="far fa-comments text-left sidebar-icon"></i>Správy</a></li>
                @endif
                    @if(Auth::user()->is_admin==1)
                    <li><a class="nav-link" href="{{ route('Dashboard') }}"><i class="fa fa-fw fa-home text-left sidebar-icon" ></i> Domov</a></li>
                    <li><a class="nav-link" href="{{ route('Settings') }}"><i class="fas fa-cogs text-left sidebar-icon" ></i> Nastavenia</a></li>
                    <li><a class="nav-link" href="{{ route('Users') }}"><i class="fas fa-users text-left sidebar-icon"></i> Users</a></li>
                    <li><a class="nav-link" href="{{ route('Subjects') }}"><i class="fas fa-flask text-left sidebar-icon"></i> Predmety</a></li>
                    <li><a class="nav-link" href="{{ route('Actuality') }}"><i class="far text-left fa-calendar-plus sidebar-icon"></i> Aktuality</a></li>
                    <li><a class="nav-link" href="{{ route('Newsletter') }}"><i class="far fa-newspaper text-left sidebar-icon"></i> Newsletter</a></li>
                    <li><a class="nav-link" href="{{ route('Chat') }}"><i class="far fa-comments text-left sidebar-icon"></i>Správy</a></li>
                    @endif
                    @if(Auth::user()->is_admin==0 && Auth::user()->is_teacher==0)
                            <li><a class="nav-link" href="{{ route('Dashboard') }}"><i class="fa fa-fw fa-home text-left sidebar-icon" ></i> Domov</a></li>
                            <li><a class="nav-link" href="{{ route('Settings') }}"><i class="fas fa-cogs text-left sidebar-icon" ></i> Nastavenia</a></li>
                            <li><a class="nav-link" href="{{ route('Classrooms') }}"><i class="fas fa-chalkboard-teacher text-left sidebar-icon" ></i> Kurzy</a></li>
                            <li><a class="nav-link" href="{{ route('Materials') }}"><i class="fas fa-book text-left sidebar-icon" ></i> Materiály</a></li>
                            <li><a class="nav-link" href="{{ route('Tests') }}"><i class="far fa-clipboard text-left sidebar-icon"></i>Testy</a></li>
                            <li><a class="nav-link" href="{{ route('Chat') }}"><i class="far fa-comments text-left sidebar-icon"></i>Správy</a></li>
                     @endif
            </ul>

        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto nav-left-part">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto font-roboto nav-right-part">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Prihlásiť') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrovať') }}</a>
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
                                {{ __('Odhlásiť') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
