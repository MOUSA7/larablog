<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your received from contact page</title>
</head>
<body style="padding: 0 10%">

<h1 style="text-align: center; background-color: #eee;color: #737373;padding: 10px">Your received a new message from {{$name}}</h1>

<blockquote>
    <h2>{{$email}}</h2>
    <h3>Subject : <p>{{$subject}}</p></h3>
    <h3>Message : <p>{{$mail_message}}</p></h3>

</blockquote>
<h2 style="text-align: center;background-color: #1d643b;color: white ">This message has been send to by using contact form at laraBlog System</h2>


</body>
</html>
