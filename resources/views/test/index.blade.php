<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{$prueba->title}}</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    Hola código facilito:
    <br><br>
    <hr>
    <h1>{{$prueba->title}}</h1>
    <hr>
    {{$prueba->content}}
    <hr>
    {{$prueba->user->name}} | {{$prueba->category->name}} |
    @foreach($prueba->tags as $tag)
        {{$tag->name}}
    @endforeach
</body>
</html>



