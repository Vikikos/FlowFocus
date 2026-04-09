<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            text-align: center
        }
        a{
            text-decoration: none;
            color: black;
        }
        a:hover{
            color: rgb(127, 127, 127);

        }
    </style>
</head>
<body>
    <h1>FLOW FOCUS API</h1>
    <a href="{{route('pomodoro.index')}}">Pomodoro</a> <br>
    <a href="{{route('task.index')}}">Tareas</a>
</body>
</html>
