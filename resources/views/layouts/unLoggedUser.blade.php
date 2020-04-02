<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<body>
<div class="flex-center full-height">
    <div class="header">
        <div class="row">
                @include('Frontend.pages.Frontend_Page.first_Menu')
        </div>
    </div>
    <div class="main">
        <div class="row">
                @include('Frontend.pages.Frontend_Page.second_Menu')
        </div>
        <div class="row h-80">
                @include('Frontend.pages.Frontend_Page.top_image')
        </div>
        <div class="row">
            @include('Frontend.pages.Frontend_Page.statistics')
        </div>

         <div class="row">
             <div class="container-fluid">
                 @include('Frontend.pages.Frontend_Page.kurzy')
             </div>
         </div>
         <div class="row">
             <div class="container-fluid bg-blue newsletter-div">
                 @include('Frontend.pages.Frontend_Page.newsletter')
             </div>
         </div>
         <div class="row">
             <div class="container-fluid">
                 @include('Frontend.pages.Frontend_Page.aktuality')
             </div>
         </div>
         <div class="row">
             <div class="container-fluid bg-blue contact-section">
                 @include('Frontend.pages.Frontend_Page.contact_Us')
             </div>
         </div>
         <div class="row">
             <div class="container-fluid " style="background-color: black;">
                 @include('Frontend.pages.Frontend_Page.footer')
             </div>
         </div>

    </div>
</div>
</body>













<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: 48.990, lng: 21.247};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 16, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }





     $(document).ready(function(){
             $("#slide").animate({
                 right:'0%'
                 //height:'100px',
             },1000);
     });
    /*function myFunction() {*/
    $('#count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    myFunction();

       let start // set on the first step to the timestamp provided
       const el = document.getElementById('count') // get the element
       const final = parseInt(el.textContent, 10) // parse out the final number
       const duration = 4000 // duration in ms
       const step = ts => {
           if (!start) {
               start = ts
           }
           // get the time passed as a fraction of total duration
           let progress = (ts - start) / duration

           el.textContent = Math.floor(progress * final) // set the text
           if (progress < 1) {
               // if we're not 100% complete, request another animation frame
               requestAnimationFrame(step)
           }
       }

       // start the animation
       requestAnimationFrame(step)



</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB13Ioe9BT8AqK5tq26RWnjNd4zlnLA5OQ&callback=initMap">
</script>
</html>




