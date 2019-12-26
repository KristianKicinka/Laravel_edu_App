@if(Auth::user()->is_admin==1)
    <div class="sidebar-left col-sm-2 float-left">
        <ul class="side-nav list-unstyled text-sm-left sidebar-ul">
            <li><a href="{{ route('Dashboard') }}"><i class="fa fa-fw fa-home text-left sidebar-icon" ></i> Dashboard</a></li>
            <li><a href="{{ route('Settings') }}"><i class="fas fa-cogs text-left sidebar-icon" ></i> Settings</a></li>
            <li><a href="{{ route('Users') }}"><i class="fas fa-users text-left sidebar-icon"></i> Users</a></li>
            <li><a href="{{ route('Subjects') }}"><i class="fas fa-flask text-left sidebar-icon"></i> Subjects</a></li>
        </ul>
    </div>
@endif
