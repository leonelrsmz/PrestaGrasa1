@extends('admin.master')
@section('title', 'Categorias')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/categories/0')}}"> 
        <i class="fas fa-shoe-prints"></i>Estilos (Categorias)
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="panel shadow">

                {{-- parte de título de la seccion --}}
                <div class="header">
                    <h2 class="title"> 
                        Agregar categoria
                    </h2>
                </div>
                {{-- parte de contenido real --}}
                <div class="inside">
                    {!!Form::open(['url'=>'/admin/category/add'])!!}
                        <label for="name" class="mtop16">Nombre del modelo:</label>
                        <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-signature"></i></span>
                                    </div>
                                </div>
                                {!!Form::text('name', null, ['class'=>'from-control'])!!}
                        </div>
                        
                        <label for="module" class="mtop16">Tipo:</label>
                        <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-signature"></i></span>
                                    </div>
                                </div>
                                {!!Form::select('module',getModulesArray(),0,['class'=>'custom-select'])!!} 
                        </div>

                        <label for="icon" class="mtop16">ícono de estilo:</label>
                        <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-signature"></i></span>
                                    </div>
                                </div>
                                {!!Form::text('icon', null, ['class'=>'from-control'])!!}
                        </div>

                        <div class="mtop16">
                            {!!Form::submit('Guardar Categoria',['class'=>'btn btn-success'])!!}
                        </div>

                    {!!Form::close()!!}
                </div>
        
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel shadow">

               
                <div class="header">
                    <h2 class="title"> 
                        Administrador de Categorias
                    </h2>
                </div>
                
                <div class="inside">

                     {{-- Subnavegación de las listas de categorias de la bd --}}
                    <nav class="nav nav-pills nav-fill">
                        @foreach(getModulesArray() as $m => $k)
                            <a class="nav-link" href="{{url('/admin/categories/'.$m)}}"> {{ $k }} </a>
                        @endforeach
                    </nav>

                    <table class="table">
                        <thead>
                            <tr>
                                <td width="30px"></td>
                                <td>Nombre</td>
                                <td width="170px">Edición</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cats as $cat)
                            <tr>
                                <td> {!! htmlspecialchars_decode($cat->icono)!!}</td> {{-- decodificación del icono --}}
                                <td>{{$cat->name}}</td>
                                <td>
                                    <a href="{{url('/admin/category/'.$cat->id.'/edit')}}" >
                                        <button type="button" class="btn btn-warning">Editar</button>
                                    </a>
                                    <a href="{{url('/admin/category/'.$cat->id.'/delete')}}" data-toggle='tooltip' data-placement="top" title="Borrar">
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
    </div>
    
</div>
@endsection
