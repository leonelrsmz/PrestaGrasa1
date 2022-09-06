@extends('admin.master')
@section('title', 'Editar')

{{-- Se agrega a la subnavegación el elemento de home users --}}
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{url('/admin/products/a')}}"> 
        <i class="fas fa-box"></i> Gestion de productos
    </a>
</li>
<li class="breadcrumb-item">
    <a href="{{url('/admin/product/edit')}}"> 
        <i class="fas fa-box"></i> Editar producto
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
                        Editar productos
                    </h2>
                </div>
        
                {{-- Contenido real de la seccion o página--}}
                <div class="inside">
                    {!!Form::open(['url'=>'/admin/product/'.$p->id.'/edit','files'=>true])!!}
                    
                    <div class="row"> {{-- Primera fila --}}
                        {{-- Nombre --}}
                        <div class="col-md-3">
                            <label for="name">Nombre del sneaker:</label>
                            <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-file-signature"></i></span>
                                        </div>
                                </div>
                                {!!Form::text('name', $p->name, ['class'=>'from-control'])!!}
                            </div>
                        </div>
        
                        {{-- Marca --}}
                        <div class="col-md-3">
                            <label for="brand">Marca:</label>
                            <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-copyright"></i></span>
                                        </div>
                                </div>
                                {!!Form::text('brand', $p->brand, ['class'=>'from-control'])!!}
                            </div>
                        </div>
        
                        {{-- Modelo (Categoria) --}}
                        <div class="col-md-3">
                            <label for="category">Modelo:</label>
                            <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="input-group-text" id="basic-addon1"> <i class="far fa-list-alt"></i></span>
                                        </div>
                                </div>
                                {!!Form::select('category',$cats, $p->category_id,['class'=>'custom-select'])!!}  {{-- Se manda a llamar a $cats de los modulos (tipos) --}}
                            </div>
                        </div>
                        {{-- Imagen --}}
                        <div class="col-md-3">
                            <label for="img">Imagen del sneaker:</label>
                            <div class="custom-file">
                                {!!Form::file('img',['class'=>'custom-file-input', 'id'=>'customfile', 'accept'=>'image/*']) !!}
                                <label class="custom-file-label" for="customfile">Agrega Imagen</label>
                            </div>
                        </div>
        
                    </div>
        
                    <div class="row mtop16">{{-- segunda fila --}}
                        {{-- Precio --}}
                        <div class="col-md-3">
                            <label for="price">Precio:</label>
                            <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-tags"></i></span>
                                        </div>
                                </div>
                                {!!Form::number('price',$p->price, ['class'=>'from-control', 'min'=>'0.00','step'=>'any'])!!} {{-- No se pueden ingresar numeros negativos y el any es para decimales--}}
                            </div>
                        </div>
                        {{-- Estado Descuento --}}
                        <div class="col-md-3">
                            <label for="indiscount">Estado descuento:</label>
                            <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-tags"></i></span>
                                        </div>
                                </div>
                                {!!Form::select('indiscount', ['0'=>'No', '1'=>'Si'],$p->in_discount,['class'=>'custom-select'])!!} 
                            </div>
                        </div>
                        {{-- Descuento --}}
                        <div class="col-md-3">
                            <label for="discount">Descuento:</label>  
                            <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-tags"></i></span>
                                        </div>
                                </div>
                                {!!Form::number('discount',$p->discount,['class'=>'form-control', 'step'=>'any'])!!} {{-- No se pueden ingresar numeros negativos y el any es para decimales--}}
                                {{-- No es con % sino con decimales--}}
                            </div>
                        </div>
                        {{-- Imagen actual --}}
                        <div class="col-md-3">
                            <label for="discount">Imagen actual:</label>  
                            <div class="input-group mtop8">
                                <img src="{{url('/uploads/'.$p->file_path.'/'.$p->image)}}" alt="" width="100" class="img-fluid">
                            </div>
                        </div>
        
                    </div>
        
                    <div class="row mtop16"> {{-- tercera fila --}}
                        {{-- Artista --}}
                        <div class="col-md-3">
                            <label for="artist">Artista:</label>
                            <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="input-group-text" id="basic-addon1"> <i class="fas fa-street-view"></i></span>
                                        </div>
                                </div>
                                {!!Form::text('artist', $p->artist, ['class'=>'from-control'])!!}
                            </div>
                        </div>
                        {{-- Talla --}}
                        <div class="col-md-3">
                            <label for="size">Talla (cm):</label>
                            <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-ruler-combined"></i></span>
                                        </div>
                                </div>
                                {!!Form::number('size',$p->size, ['class'=>'from-control', 'min'=>'22.0','step'=>'any'])!!}
                            </div>
                        </div>
                        {{-- Descripción --}}
                        <div class="col-md-6">
                            <label for="content">Descripción:</label>
                            {!!Form::textarea('content',$p->content,['class'=>'form-control'])!!}
                        </div>
                    </div>
        
                    <div class="row mtop16"> {{-- cuarta fila --}}
                        <div class="col-md-12">
                            <label for="status">Estado:</label>
                            <div class="input-group mtop8">
                                <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="input-group-text" id="basic-addon1"> <i class="far fa-list-alt"></i></span>
                                        </div>
                                </div>
                                {!!Form::select('status',['0'=>'Borrador','1'=>'Público'],$p->status,['class'=>'custom-select'])!!}  {{-- Se manda a llamar a $cats de los modulos (tipos) --}}
                            </div>
                        </div>
                    </div>

                    <div class="row mtop16">
                        {{-- Submit --}}
                        <div class="col-md-12">
                            {!!Form::submit('Editar',['class'=>'btn btn-success'])!!}
                        </div>
                    </div>
                    
        
                    {!!Form::close()!!}
                </div>
        
            </div>
        </div>
    </div>
    
</div>
@endsection