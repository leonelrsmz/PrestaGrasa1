@extends('admin.master')
@section('title', 'Productos')

{{-- Se agrega a la subnavegación el elemento de home users --}}
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/products/a')}}"> 
        <i class="fas fa-box"></i> Gestion de productos
    </a>
</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="panel shadow">

        {{-- parte de título de la seccion --}}
        <div class="header">
            <h2 class="title"> 
                Gestion de Productos
            </h2>
            <ul class="mtop16 shadow">
                <li>
                    <a href="#">Filtrar <i class="fas fa-caret-square-down"></i></a>
                    <ul class="shadow">
                        <li> 
                            <a href="{{url('/admin/products/1')}}"><i class="fas fa-globe-americas"></i> Públicos</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/products/0')}}"><i class="fas fa-eraser"></i> En Borrador</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/products/a')}}"><i class="fas fa-globe-americas"></i>Todos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="btn_search"><i class="fas fa-search"></i>Buscar </a>
                </li>
            </ul>
        </div>

        

        {{-- Contenido real de la seccion o página--}}
        <div class="inside">

            <div class="row">
                <div class="btns col-md-3">
                    <a href="{{url('/admin/product/add')}}">
                        <button type="button" class="btn btn-success">
                            <i class="fas fa-plus-circle"></i>Agregar Producto
                        </button>
                    </a>
                </div>

                <div class="form_search col-md-9" id="form_search">
                    {!!Form::open(['url'=>'/admin/product/search'])!!}
                    <div class="row">
                        <div class="col-md-9">
                            {!!Form::text('search',null,['class'=>'form-control', 'placeholder'=>'Busque el nombre del producto...'])!!}
                        </div>
                        <div class="col-md-3">
                            {!!Form::submit('Buscar',['class'=>'btn btn-success'])!!}
                        </div>
                    </div>
                    {!!Form::close()!!}

                </div>
                <div class="form_search col-md-3" id="form_search">
                    
                </div>
            </div>
           
            
            <table class="table table-striped mtop16">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td></td>  
                        <td>Nombre</td>
                        <td>Marca</td>
                        <td>Categoría</td>
                        <td>Artista</td>
                        <td>Precio</td>
                        <td>Talla</td>
                        <td>Edicion</td>   
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr @if($p->status=="0") class="table-danger" @endif
                            @if($p->status=="1") class="table-info" @endif>
                            <td width="50">{{$p->id}}</td>
                            <td width="60"> 
                                <a href="{{url('/uploads/'.$p->file_path.'/'.$p->image)}}">
                                    <img src="{{url('/uploads/'.$p->file_path.'/t_'.$p->image)}}" alt="" width="60"> 
                                </a>
                            </td> {{--Se obtiene el tumbnail--}}
                            <td> 
                                @if($p->status=="0") <i class="fas fa-eraser"></i><i data-toggle='tooltip' data-placement="top" title="Borrador">{{$p->name}} </i> @endif 
                                @if($p->status=="1") {{$p->name}} @endif
                            </td>
                            <td>{{$p->brand}}</td>
                            <td>{{$p->cat->name}}</td>
                            <td>{{$p->artist}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->size}}</td>
                            <td>
                                <a href="{{url('/admin/product/'.$p->id.'/edit')}}" >
                                    <button type="button" class="btn btn-warning">Editar</button>
                                </a>
                                <a href="{{url('/admin/product/'.$p->id.'/delete')}}" data-toggle='tooltip' data-placement="top" title="Eliminar">
                                    <i class="fas fa-user-slash"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                        <tr>
                           <td colspan="9">{!!$products->render()!!}</td> 
                        </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection