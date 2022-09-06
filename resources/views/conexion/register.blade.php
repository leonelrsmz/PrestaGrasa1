{{-- Conexión con la vista maestra de la aplicación --}}
@extends('conexion.master')
@section('title','Registrarse')


@section('content')
<div class="box box_register shadow">
    
    <div class="header shadow">
        <a href="{{url('/')}}">
            <img src="{{url('/static/images/logo_1.png')}}" alt="Presta_Grasa_logo">
        </a>
    </div>

    <div class="inside">
        {!! Form::open(['url' => '/register']) !!}
        @csrf
        <label for='name'> Ingrese su nombre: </label>
        <div class="input-group mtop8">
            <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="far fa-user"></i>
                    </div>
            </div>
            {!! Form::text('name', null, ['class'=> 'from-control', 'required']) !!} {{-- Al agregar 'required' al formulario se señala que es necesario antes de enviarlo --}}
        </div>

        <label for='lastname' class="mtop16"> Ingrese su Apellido: </label>
        <div class="input-group mtop8">
            <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="far fa-user"></i>
                    </div>
            </div>
            {!! Form::text('lastname', null, ['class'=> 'from-control', 'required']) !!}
        </div>

        <label for='email' class="mtop16"> Ingrese correo electrónico: </label>
        <div class="input-group mtop8">
            <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
            </div>
            {!! Form::email('email', null, ['class'=> 'from-control', 'required']) !!}
        </div>

        <label for='password' class="mtop16"> Ingrese su contraseña: </label>
        <div class="input-group mtop8">
            <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-key"></i>
                    </div>
            </div>
            {!! Form::password('password', ['class'=> 'from-control', 'required']) !!}
        </div>

        <label for='password' class="mtop16"> Confirme su contraseña </label>
        <div class="input-group mtop8">
            <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-key"></i>
                    </div>
            </div>
            {!! Form::password('repassword', ['class'=> 'from-control', 'required']) !!}
        </div>

        <label for='rol' class="mtop16"> ROL (Temporal) </label>
        <div class="input-group mtop8">
            <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-key"></i>
                    </div>
            </div>
            {!!Form::select('rol',getPrivilegesArray(),0,['class'=>'custom-select'])!!} 
        </div>


        {!!Form::submit('Registrate Ya!', ['class' => 'btn btn-success mtop20 shadow-sm'])!!}

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

        <div class="mtop16 footer">
            Ya tengo una cuenta en Presta Grasa
            <a href="{{url('/login')}}">Ingresar</a>
        </div>
    </div>
</div>
@stop
