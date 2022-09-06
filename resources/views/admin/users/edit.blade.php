@extends('admin.master')
@section('title', 'Editar usuario')

@section('breadcrumb')
    <a href="{{url('/admin/users/edit')}}"> 
        <i class="fas fa-file-signature"></i>Editar Usuario
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel shadow">

                {{-- parte de título de la seccion --}}
                <div class="header">
                    <h2 class="title"> 
                        Editar usuario
                    </h2>
                </div>
                {{-- parte de contenido real --}}
                <div class="inside">
                    {!!Form::open(['url'=>'/admin/user/'.$u->id.'/edit'])!!}

                        <label for="name" class="mtop16">Nuevo nombre:</label>
                        <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-signature"></i></span>
                                    </div>
                                </div>
                                {!!Form::text('name', $u->name, ['class'=>'from-control'])!!}
                        </div>
                        
                        <label for="lastname" class="mtop16">Nuevo Apellido:</label>
                        <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-signature"></i></span>
                                    </div>
                                </div>
                                {!!Form::text('lastname', $u->lastname, ['class'=>'from-control'])!!}
                        </div>

                        <label for='password' class="mtop16"> Ingrese su nueva contraseña: </label>
                        <div class="input-group mtop8">
                            <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </div>
                            </div>
                            {!! Form::password('password', $u->password, ['class'=> 'from-control', 'required']) !!}
                        </div>

                        <label for='email' class="mtop16"> Ingrese su nuevo correo electrónico: </label>
                        <div class="input-group mtop8">
                            <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope-open-text"></i>
                                    </div>
                            </div>
                            {!! Form::email('email', $u->email, ['class'=> 'from-control', 'required']) !!}
                        </div>

                        
                        <div class="mtop16">
                            {!!Form::submit('Actualizar',['class'=>'btn btn-success'])!!}
                        </div>

                    {!!Form::close()!!}
                </div> 
        
            </div>
        </div>

        
    </div>
    
</div>
@endsection
