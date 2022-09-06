<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrestaGrasa -@yield('title')</title>
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
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- Alertas--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- Kit de fuentes de letras e íconos "FONTAWESOME" --}}
    <script src="https://kit.fontawesome.com/11b6b10cb6.js" crossorigin="anonymous"></script>

    
    <script>
        $(document).ready(function(){ //Script que necesita JQuery para inicializarse
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

   <script src="{{url('/static/js/site.js')}}"></script>
   
    <link rel="stylesheet" href="{{url('/static/css/style.css?v'.time())}}"> 

</head>

<body>

    <nav class="navbar navbar-expand-lg shadow">
        <div class="container">
            <a href="{{url('/')}}" class="navbar-brand white">
                <img src="{{url('/static/images/logo_1.png')}}" alt="Presta Grasa"> Servicio de alquilación de Sneakers
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toogle navigation">
                <span class="navbar-toggle-icon">

                </span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link white">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link white">Colecciones</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link white "><i class="fas fa-clipboard-list"></i> Planes</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link white ">Blog</a>
                    </li>
                    @if(Auth::guest())
                        <li class="nav-item">
                            <a href="{{url('/login')}}" class="nav-link white btn btn-success">Ingresar</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{url('/admin')}}" class="nav-link white"><i class="fas fa-cart-arrow-down"></i> Alquila</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/logout')}}" class="nav-link white btn btn-danger">Cerrar Sesión</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @section('content') 
    @show


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

    
</body>
</html>