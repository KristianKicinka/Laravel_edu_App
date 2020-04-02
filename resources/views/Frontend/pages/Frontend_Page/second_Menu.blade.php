<nav class="navbar navbar-expand-md shadow-sm navbar-light bg-light w-100 pr-2" style="{border-top: 1px solid navajowhite; padding-right: 0%; background-color:white;}" id="navbar" >
    <div class="container-fluid">
                <a href="#" class="navbar-brand px-4" style="color: #112134;font-weight: bold;">
                    <i class="fas fa-university"style="font-size: 250%;"></i>
                    <h3 class="d-inline-block font-weight-bold px-2">Edu-Portal</h3>
                </a>
        <button class="navbar-toggler colapse-menu float-left mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>




        <div class="collapse navbar-collapse text-center" id="navbarNav">
            <ul class="navbar-nav ml-auto font-roboto nav-right-part font-weight-bold">
                <li class="nav-item active w-20" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('contact_us')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">Kontakt</a>
                </li>

                <li class="nav-item active w-20" style="" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('statistics')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">O portáli</a>
                </li>
                <li class="nav-item active w-20" style="" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('aktuality')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;" >Aktuality</a>
                </li>
                <li class="nav-item active w-20" style="" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('kurzy')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;" >Predmety</a>
                </li>

                <li class="nav-item active w-20" style="" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                    <a class="nav-link" onclick="(document.getElementById('newsletter')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">Newsletter</a>
                </li>
            </ul>

        </div>

    </div>

</nav>

{{--<div id="arrow_to_top">
    <a class="nav-link" onclick="(document.getElementById('top')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;">--}}{{--<i class="fas fa-arrow-up"></i>--}}{{--<i class="fas fa-chevron-up"></i></a>

</div>
<script>
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.position = "fixed";
            document.getElementById("navbar").style.top = "0";
            document.getElementById("navbar").style.zIndex = "100";
            document.getElementById("arrow_to_top").style.display = "block" ;

        } else {
            document.getElementById("navbar").style.position = "relative";
            document.getElementById("arrow_to_top").style.display = "none";

        }
    }
</script>--}}
