<nav class="navbar navbar-expand-md shadow-sm " style="{border-top: 1px solid navajowhite; width: 100%; background-color:white;}" id="slide" >
    <div class="container-fluid">
        <button class="navbar-toggler colapse-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto nav-left-part" style="width: 100%;">

                <p style="{color: #112134; font-size: 20px;font-weight: bold; width: 100%;}"><i class="fas fa-university" style="{color: #112134; font-size: 30px;margin-right: 1%;}"></i>Edu - Portal</p>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto font-roboto nav-right-part" style="{position: absolute;}" id="second_Menu">
                <!-- Authentication Links -->

                <li class="nav-item active" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('contact_us')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">Kontakt</a>
                </li>

                <li class="nav-item active" style="" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('statistics')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">O portáli</a>
                </li>
                <li class="nav-item active" style="" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('aktuality')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;" >Aktuality</a>
                </li>
                <li class="nav-item active" style="" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('kurzy')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;" >Predmety</a>
                </li>

                <li class="nav-item active" style="" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('newsletter')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">Newsletter</a>
                </li>


            </ul>
        </div>
    </div>
</nav>
