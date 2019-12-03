
@if(Auth::user()->is_teacher==1)
    <div class="sidebar-left col-sm-2 float-left">
        <ul class="side-nav list-unstyled text-sm-left sidebar-ul">
            <li><a href="{{ route('Dashboard') }}"><i class="fa fa-fw fa-home text-left sidebar-icon" ></i> Dashboard</a></li>
            <li><a href="{{ route('Settings') }}"><i class="fas fa-cogs text-left sidebar-icon" ></i> Settings</a></li>
            <li><a href="{{ route('Tests') }}"><i class="far fa-clipboard text-left sidebar-icon"></i>Tests</a></li>
            <li><a href="{{ route('Materials') }}"><i class="fas fa-book text-left sidebar-icon" ></i> Materials</a></li>
            <li><a href="{{ route('Students') }}"><i class="fas fa-user-graduate text-left sidebar-icon" ></i> Students</a></li>
            <li><a href="{{ route('Classrooms') }}"><i class="fas fa-chalkboard-teacher text-left sidebar-icon" ></i> Classrooms</a></li>
            <li><a href="{{ route('Subjects') }}"><i class="fas fa-flask text-left sidebar-icon"></i> Subjects</a></li>
        </ul>
    </div>
@endif

@if(Auth::user()->is_student==1)
    <h1>Student</h1>
@endif

@if(Auth::user()->is_admin==1)
    <h1>Admin</h1>
@endif