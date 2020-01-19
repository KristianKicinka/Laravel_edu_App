<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-orange py-2 ">
    <div class="container-fluid pt-1">
        <div class="text-center w-100">
            <span id="countdown" class="timer"></span>
        </div>
    </div>
</nav>

<script>
    var seconds = 120;
    function secondsPassed() {
        var minutes = Math.round((seconds-30)/60);
        var rem_seconds = seconds % 60;
        if (rem_seconds<10){
            rem_seconds = "0"+rem_seconds;
        }
        document.getElementById('countdown').innerHTML = minutes+":"+rem_seconds;

        if (seconds==0){
            clearInterval(countdownTimer);
            document.getElementById('countdown').innerHTML = "End";
        }else {
            seconds--;
        }
    }
    var countdownTimer = setInterval('secondsPassed()',1000)
</script>
