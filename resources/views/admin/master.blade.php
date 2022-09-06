<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrestaGrasa - @yield('title')</title>
    <meta name="csrf-token" content="{{csrf_token()}}">  {{-- Token para formularios--}}
    <meta name="routeName" content="{{ Route::currentRouteName()}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kaushan+Script&family=Lato&family=M+PLUS+1+Code&family=Pacifico&family=Righteous&display=swap" rel="stylesheet"> 
    {{-- Se  templates de bootstrap- JS Jquery --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    {{-- Alertas--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Kit de fuentes de letras e íconos "FONTAWESOME" --}}
    <script src="https://kit.fontawesome.com/11b6b10cb6.js" crossorigin="anonymous"></script>

    
    <script>
        $(document).ready(function(){ //Script que necesita JQuery para inicializarse
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

   <script src="{{url('/static/js/admin.js')}}"></script>
   
    <link rel="stylesheet" href="{{url('/static/css/admin.css?v'.time())}}"> 

    
    


</head>
<body>

    <div class="wrapper">
        <div class="col1">@include('admin.sidebar')</div>  {{-- Se manda a llamar a la vista sidebar --}}
        <div class="col2"> 
            
            {{-- Barra de navegación general --}}
            <nav class="navbar navbar-expand-lg shadow">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a href="{{url('/admin')}}" class="nav-link">
                                <i class="fas fa-home"></i> Panel DashBoard
                            </a>
                        </li>
                        <li class="nav-item btn btn-danger ">
                            <a href="{{url('/logout')}}" data-toggle='tooltip' data-placement="top" title="Salir">  {{-- Toottip de JQery para indicar un mensaje al colocar el mouse--}}
                                <i class="fas fa-sign-out-alt"> Cerrar Sesión</i>
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            {{-- Subbarra de navegación dependiendo el tipo de pagina, ya sea dashboard, productos, etc --}}
            <div class="page">
                <div class="container-fluid">
                    <nav aria-label="breadcrumb shadow">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/admin')}}">
                                <i class="fas fa-home"></i> Panel
                            </a>
                            </li>
                            @section('breadcrumb')  {{-- Aqui se irán agregando más opciones para la subnavegacion --}}
                            @show
                        </ol>
                    </nav>
                </div>

                @if(Session::has('message'))  {{-- Alerta e bootstrap --}}
                <div class="container">
                    <div class="alert alert-{{Session::get('typealert')}}" style="display:none;">
                        {{ Session::get('message') }}
                        @if ($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                            <li> {{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                        <script>
                            $('.alert').slideDown();
                            setTimeout(function(){ $('.alert').slideUp(); }, 10000);
                        </script>
                    </div>
                </div>
                @endif

                {{-- Información y contenido variable dependiendo en la página que nos encontremos, ya sea dashboard, usuarios, etc.--}}
                @section('content') 
                @show

            </div>

        </div>
    </div>


    
</body>
</html>