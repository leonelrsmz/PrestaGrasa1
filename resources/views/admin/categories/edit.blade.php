@extends('admin.master')
@section('title', 'Editar categorias')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/categories/0')}}"> 
        <i class="fas fa-shoe-prints"></i>Estilos (Categorias)
    </a>
</li>
<li class="breadcrumb-item">
    <a href="{{url('/admin/categories/edit')}}"> 
        <i class="fas fa-file-signature"></i>Editar Categoría
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
                        Editar categoria
                    </h2>
                </div>
                {{-- parte de contenido real --}}
                <div class="inside">
                    {!!Form::open(['url'=>'/admin/category/'.$cat->id.'/edit'])!!}
                        <label for="name" class="mtop16">Nuevo nombre:</label>
                        <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-signature"></i></span>
                                    </div>
                                </div>
                                {!!Form::text('name', $cat->name, ['class'=>'from-control'])!!}
                        </div>
                        
                        <label for="module" class="mtop16">Tipo:</label>
                        <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-signature"></i></span>
                                    </div>
                                </div>
                                {!!Form::select('module',getModulesArray(),$cat->module,['class'=>'custom-select'])!!} 
                        </div>

                        <label for="icon" class="mtop16">ícono de estilo:</label>
                        <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-signature"></i></span>
                                    </div>
                                </div>
                                {!!Form::text('icon', $cat->icono, ['class'=>'from-control'])!!}
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
