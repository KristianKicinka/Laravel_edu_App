<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <link rel="stylesheet" href="../public/css/reset.css">


    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Certificate</title>
    <style>
        .background{
            background-color: #1E2458;
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: -1;
        }
        h1{
            position: relative;
            font-family: Arial, sans-serif;
            font-size: 600%;
            padding-top: 15%;
            padding-right: 20%;
            float: right;
        }
        h2{
            position: fixed;
            font-family: Arial, sans-serif;
            font-size: 400%;
            top: 700px;
            left:2200px;
        }
        h3{
            position: fixed;
            font-family: Arial, sans-serif;
            font-size: 300%;
            top: 1200px;
            left:1800px;
        }
        h4{
            position: fixed;
            font-family: Arial, sans-serif;
            font-size: 300%;
            top: 1500px;
            left:2200px;
        }
    </style>
</head>
<body>
<img src="{{ public_path("img/Certificate.jpg") }}" alt="" class="background">
<div class="window">
<h1>Certificate</h1>
    <h2>{{ $test_name }}</h2>
    <h3>{{ $student_name }}</h3>
    <h4>{{ $percentage }}</h4>
</div>

</body>
</html>
