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
            font-family: Arial;
            font-size: 600%;
            padding-top: 15%;
            padding-right: 20%;
            float: right;
        }
        h2{
            position: fixed;
            font-family: Arial, sans-serif;
            font-size: 400%;
            top: 1000px;
            left:800px;
        }
        h3{
            position: fixed;
            font-family: Arial, sans-serif;
            font-size: 300%;
            top: 1300px;
            left:800px;
        }
        h4{
            position: fixed;
            font-family: Arial, sans-serif;
            font-size: 300%;
            top: 1550px;
            left:800px;
        }
        #main_context_of_certificate{
            width: 80%;
            height: 80%;
            text-align: left;
           /* background-color: red;*/
            margin-left: 10%;

        }
        .logoPNG{
            margin-left: 7%;
            margin-top: 150px;
            width: 800px;
            height: 800px;
            display: inline-block;
            z-index: 10;
            position: absolute;
        }
        .stamp{
            float: right;
            margin-right: 500px;
            top: 1600px;
            width: 400px;
            position: absolute;

        }
    </style>
</head>
<body>
<img src="{{ public_path("img/Certificate.jpg") }}" alt="" class="background">
<div class="window">
    <img src="{{ public_path("img/CertifikatPNG.png") }}" alt="" class="logoPNG">
<h1>Certificate</h1>
    <div id="main_context_of_certificate">
    <h2>{{ "Test name: ".$test_name }}</h2>
    <h3>{{ "Student name: ".$student_name }}</h3>
    <h4>{{ "Your percentage: ".$percentage }}</h4>
    </div>
    <img src="{{ public_path("img/Asset 1.png") }}" alt="" class="stamp">
</div>

</body>
</html>
