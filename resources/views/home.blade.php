@extends('master')

@section('title','inicio')

@section('content')
<div class="contenedor">
<table class="table table-striped mtop16 shadow">
    <thead>
        <tr>
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
                <td width="70"> 
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
                    <a href="{{url('/login')}}" >
                        <button type="button" class="btn btn-info">Alquilar</button>
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
@endsection