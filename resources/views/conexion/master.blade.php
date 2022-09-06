<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrestaGrasa - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kaushan+Script&family=Lato&family=M+PLUS+1+Code&family=Pacifico&family=Righteous&display=swap" rel="stylesheet"> 
    {{-- Se  templates de bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- Ruta estática al stylus principal con variable de actualización--}}
    <link rel="stylesheet" href="{{url('/static/css/conexion.css?v'.time())}}"> 
    {{-- Alertas--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Kit de fuentes de letras e íconos "FONTAWESOME" --}}
    <script src="https://kit.fontawesome.com/11b6b10cb6.js" crossorigin="anonymous"></script>

    
    


</head>
<body>

    


    @section('content')
    amigas
    @show
    
</body>
</html>