<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Education Portal</title>
</head>
<body>
    <h2>Welcome, {{ $adddata->name}} to Education Portal</h2>
    <br>
    <p>You have successfully register.<br><br>
    Your role is: {{$useraccess->accesstype}}<br><br>
    Your login mail id: {{$adddata->email}}<br><br>
    <a href="{{ route('students.login') }}">Click here to login</a><br><br>
    Thank you!!</p>
</body>
</html>