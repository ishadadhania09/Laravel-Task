<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chapter Status Change</title>
</head>
<body>
    <p>Chapter ID: {{ $chapter->id }}</p>
    <p>Chapter Name: {{ $chapter->chapter }}</p>
    @if($chapter->active)
        <p>Status: Active</p>
    @else
        <p>Status: Deactive</p>
    @endif

</body>
</html>