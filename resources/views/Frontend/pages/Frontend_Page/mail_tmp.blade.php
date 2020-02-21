<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

</head>
<body>
<header>
    <h1> This is the contact mail</h1>
</header>
<main>
    <strong>From:</strong> {{ $request['email'] }}
    <br>
    <br>
    <p>{{ $request['message'] }}</p>
</main>
</body>
</html>
