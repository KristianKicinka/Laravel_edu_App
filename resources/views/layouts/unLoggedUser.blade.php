<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

@include('Frontend.pages.Frontend_Page.first_Menu')
@include('Frontend.pages.Frontend_Page.second_Menu')
@include('Frontend.pages.Frontend_Page.top_image')
@include('Frontend.pages.Frontend_Page.statistics')
@include('Frontend.pages.Frontend_Page.kurzy')
@include('Frontend.pages.Frontend_Page.newsletter')
@include('Frontend.pages.Frontend_Page.aktuality')
@include('Frontend.pages.Frontend_Page.contact_Us')
@include('Frontend.pages.Frontend_Page.footer')



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





   /* $(document).ready(function(){
            $("#slide").animate({
                right:'0%'
                //height:'100px',
            },1000);
    });*/
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
/*}
myFunction();*/

/*   let start // set on the first step to the timestamp provided
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
   requestAnimationFrame(step)*/



</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB13Ioe9BT8AqK5tq26RWnjNd4zlnLA5OQ&callback=initMap">
</script>




