@if(Auth::user()->is_admin==1)
    <div class="sidebar-left col-sm-2 float-left">
        <ul class="side-nav list-unstyled text-sm-left sidebar-ul">
            <li><a class="left-sidebar-link" href="{{ route('Dashboard') }}"><i class="fa fa-fw fa-home text-left sidebar-icon" ></i> Domov</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Settings') }}"><i class="fas fa-cogs text-left sidebar-icon" ></i> Nastavenia</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Users') }}"><i class="fas fa-users text-left sidebar-icon"></i> Users</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Subjects') }}"><i class="fas fa-flask text-left sidebar-icon"></i> Predmety</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Actuality') }}"><i class="far text-left fa-calendar-plus sidebar-icon"></i> Aktuality</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Newsletter') }}"><i class="far fa-newspaper text-left sidebar-icon"></i> Newsletter</a></li>
        </ul>
    </div>
@endif
