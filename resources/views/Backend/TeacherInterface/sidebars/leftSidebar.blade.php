
@if(Auth::user()->is_teacher==1)
    <div class="sidebar-left col-sm-2 float-left">
        <ul class="side-nav list-unstyled text-sm-left sidebar-ul">
            <li><a class="left-sidebar-link" href="{{ route('Dashboard') }}"><i class="fa fa-fw fa-home text-left sidebar-icon" ></i> Domov</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Settings') }}"><i class="fas fa-cogs text-left sidebar-icon" ></i> Nastavenia</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Tests') }}"><i class="far fa-clipboard text-left sidebar-icon"></i>Testy</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Results') }}"><i class="fas fa-receipt text-left sidebar-icon" ></i> Výsledky testov</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Materials') }}"><i class="fas fa-book text-left sidebar-icon" ></i> Materiály</a></li>
            {{--<li><a class="left-sidebar-link" href="{{ route('Students') }}"><i class="fas fa-user-graduate text-left sidebar-icon" ></i> Students</a></li>--}}
            <li><a class="left-sidebar-link" href="{{ route('Classrooms') }}"><i class="fas fa-chalkboard-teacher text-left sidebar-icon" ></i> Kurzy</a></li>
            <li><a class="left-sidebar-link" href="{{ route('Chat') }}"><i class="far fa-comments text-left sidebar-icon"></i>Správy</a></li>
        </ul>
    </div>
@endif
