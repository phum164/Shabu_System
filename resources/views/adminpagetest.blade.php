<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Only admin is allowed</h1>
    <h2>{{auth()->user()->position->name}}</h2>
    <h2>{{auth()->user()->name}}</h2>
    <h2>{{auth()->user()->id}}</h2>
    <h2>{{auth()->user()->position_id}}</h2>
    
</body>
</html>