@extends('admin.master')
@section('title', 'Usuarios')


{{-- Se agrega a la subnavegación el elemento de home users --}}
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/users')}}"> 
        <i class="fas fa-users"></i> Gestion de usuarios
    </a>
</li>
@endsection

{{-- Reemplazo de contenido real --}}
@section('content')
<div class="container-fluid">
    <div class="panel shadow">

        {{-- parte de título de la seccion --}}
        <div class="header">
            <h2 class="title"> 
                Gestion de usuarios
            </h2>
        </div>

        {{-- Contenido real de la seccion o página--}}
        <div class="inside">
            <table class="table">
                <thead> {{-- Encabezado de la tabla de usuarios--}}
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Contraseña</td>
                        <td>Correo Electronico</td>
                        <td>Rol</td>
                        <td>Edicion</td>
                    </tr>
                </thead>

                <tbody> {{-- Cuerpo, tuplas de la base de datos usando la variable users del controlador UserController--}}
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->rol }} </td>
                        <td>
                            {{--
                            <a href="{{url('/admin/user/'.$user->id.'/edit')}}" >
                                <button type="button" class="btn btn-warning">Editar</button>
                            </a> 
                        --}}
                            <a href="{{url('/admin/user/'.$user->id.'/delete')}}" data-toggle='tooltip' data-placement="top" title="Borrar">
                                <i class="fas fa-user-slash"></i>
                            </a>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection