<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <link rel="stylesheet" href="../public/css/reset.css">


    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Certifikát</title>
    <style>
        .background{
            background-color: #1E2458;
            position: absolute;
            left: 0px;
            top: 0px;
            z-index: -1;
            width: 100%;

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
            top: 40%;
            left:35%;
        }
        h3{
            position: fixed;
            font-family: Arial, sans-serif;
            font-size: 300%;
            top: 52%;
            left:25%;
        }
        h4{
            position: fixed;
            font-family: Arial, sans-serif;
            font-size: 300%;
            top: 65%;
            left:25%;

        }
        #main_context_of_certificate{

            width: 80%;
            height: 80%;
            text-align: left;
           /* background-color: red;*/
            margin-left: 10%;
            z-index: 10;
        }
        .logoPNG{
            margin-left: 5%;
            margin-top: 150px;
            width: 30%;
            height: 30%;
            display: inline-block;
            z-index: 10;
            position: absolute;
        }
        .stamp{
            float: right;
            margin-right: 15%;
            top: 70%;
            width: 10%;
            position: absolute;

        }
    </style>
</head>
<body>
<img src="{{ public_path("img/Certificate.jpg") }}" alt="" class="background">
<div class="window">
    <img src="{{ public_path("img/CertifikatPNG.png") }}" alt="" class="logoPNG">
<h1>Certifikát</h1>
    <div id="main_context_of_certificate">
    <h2>{{ "Názov testu: ".$test_name }}</h2>
    <h3>{{ "Meno Študenta: ".$student_name }}</h3>
    <h4>{{ "Percento: ".$percentage }}</h4>
    </div>
    <img src="{{ public_path("img/Asset 1.png") }}" alt="" class="stamp">
</div>

</body>
</html>
