{{-- Conexión con la vista maestra de la aplicación --}}
@extends('conexion.master')
@section('title','login')


@section('content')
<div class="box box_login shadow">
    
    <div class="header">
        <a href="{{url('/')}}">
            <img src="{{url('/static/images/logo_1.png')}}" alt="Presta_Grasa_logo">
        </a>
    </div>

    <div class="inside">
        {!! Form::open(['url' => '/login']) !!}
        @csrf
        <label for='email'> Ingrese correo electrónico: </label>
        <div class="input-group mtop8">
            <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
            </div>
            {!! Form::email('email', null, ['class'=> 'from-control']) !!}
        </div>

        <label for='password' class="mtop16"> Ingrese su contraseña: </label>
        <div class="input-group mtop8">
            <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-key"></i>
                    </div>
            </div>
            {!! Form::password('password', ['class'=> 'from-control']) !!}
        </div>

        {!!Form::submit('Ingresar', ['class' => 'btn btn-success mtop20 shadow-sm'])!!}

        {!! Form::close() !!}

        @if(Session::has('message'))
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

        <div class="mtop16">
            ¿No tienes cuenta?
            <a href="{{url('/register')}}">Regsitrate</a>
        </div>
    </div>
</div>
@stop
