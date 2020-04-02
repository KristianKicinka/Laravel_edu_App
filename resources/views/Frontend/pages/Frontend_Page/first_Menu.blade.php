<nav id="top" class="navbar navbar-expand-md navbar-expand-sm navbar-expand shadow bg-blue text-light container-fluid">
   <div class="language col-md-2 py-2">
       <ul class="navbar-nav">
           <li class="nav-item">
               <a href="" class="nav-link text-light" style="border-right: 1px solid white;">Slovak</a>
           </li>
           <li class="nav-item">
               <a href="" class="nav-link text-light">English</a>
           </li>
       </ul>
   </div>
    <div class="address col-md-6 col-sm-3 float-left">
        <ul class="navbar-nav navbar-expand navbar-expand-sm navbar-expand-md">
            <li class="nav-item vw-50">
                <a href="" class="nav-link text-light">
                    <i class="fas fa-map-marker-alt"></i>
                    Plzenská 1, Prešov
                </a>
            </li>
            <li class="nav-item vw-50">
                <a href="tel:+421911369367" class="nav-link text-light">
                    <i class="fas fa-phone-square"></i>
                    +421 911 369 367
                </a>
            </li>
        </ul>
    </div>
    {{--<div class="col-md-3"></div>--}}
    <div class="col-md-2 auth float-right">
        <ul class="navbar-nav navbar-expand navbar-expand-sm navbar-expand-md">
            <li class="nav-item w-40">
                <a class="nav-link text-light" href="{{ route('login') }}" >{{ __('Prihlásiť') }}</a>
            </li>
            <li class="nav-item w-40" style="border-right: 1px solid white">
                <a class="nav-link text-light"  href="{{ route('register') }}" >{{ __('Registrovať') }}</a>
            </li>
            <li class="nav-item w-20 px-2 ">
                <a class="nav-link text-light w-100 text-center" style="padding-top: 40%;" href="">
                    <i class="fas fa-search" style="font-size: 120%"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div id="arrow_to_top">
    <a class="nav-link" onclick="(document.getElementById('top')).scrollIntoView({behavior: 'smooth'})" style="cursor: pointer;"><i class="fas fa-chevron-up"></i></a>
</div>
<script>
   if (screen.width>=768){
       window.onscroll = function() {scrollFunction()};
       function scrollFunction() {
           if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
               document.getElementById("navbar").style.position = "fixed";
               document.getElementById("navbar").style.top = "0";
               document.getElementById("navbar").style.zIndex = "100";
               document.getElementById("navbar").style.marginLeft = "1%";
               document.getElementById("arrow_to_top").style.display = "block" ;

           } else {
               document.getElementById("navbar").style.position = "relative";
               document.getElementById("arrow_to_top").style.display = "none";

           }
       }
   }


</script>




