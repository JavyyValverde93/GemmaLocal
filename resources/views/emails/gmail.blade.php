<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>{{$details['title']}}</h2>
    <p>Estas son las credenciales para acceder a la plataforma de GemmaAlmeria</p>
    <ul>
        <li>Nombre: {{$details['nombre']}}</li>
        <li>Email: {{$details['email']}}</li>
        <li>Contraseña: {{$details['pwd']}}</li>
    </ul>

    <p>Gracias por usar GemmaAlmeria</p>
</body>
</html>
