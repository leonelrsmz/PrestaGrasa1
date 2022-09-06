<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function __Construct(){ //Retorna al inicio si es que el usuario no tiene los permisos de adminsitrador
        $this->middleware('auth'); //Midleware basico de autenticacion
        $this->middleware('isadmin'); //El que creamos en la carpeta middleware IsAdmin y el que referenciamos en el kernel
    } //Como lo indica el archivo isAdmin, si el usuario no es 0, lo retorna a la página principal

    public function getDashboard(){
        return view('admin.dashboard');

    }
}
