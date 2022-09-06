@extends('admin.master')
@section('title', 'dashboard')

{{-- Contenido exclusivo de dashboard despues de la subbarra de navegacion--}}
@section('content')

    <div class="container-fluid">
        <div class="panel shadow">

            {{-- parte de título de la seccion --}}
            <div class="header">
                <h2 class="title"> 
                    Panel de control
                </h2>
            </div>

            {{-- Contenido real de la seccion o página--}}
            <div class="inside">
                <div class="bienv">
                    Bienvenido(a) {{Auth::user()->name}} {{Auth::user()->lastname}}
                    </div>
                </div>
                
            </div>

        </div>
    </div>

@endsection