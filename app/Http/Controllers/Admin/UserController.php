<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator, Hash, Auth, Str;

class UserController extends Controller
{
    public function __Construct(){ //Retorna al inicio si es que el usuario no tiene los permisos de adminsitrador
        $this->middleware('auth'); //Midleware basico de autenticacion
        $this->middleware('isadmin'); //El que creamos en la carpeta middleware IsAdmin y el que referenciamos en el kernel
    } //Como lo indica el archivo isAdmin, si el usuario no es 0, lo retorna a la página principal

    public function getUsers(){ //Mostrar la tabla de usuarios entre la base de datos y la app
        $users=User::orderBy('id','Desc')->get();
        $data=['users'=>$users]; //Se devuevle a la vista la data de la peticion a la db
        return view('admin.users.home', $data);
    }

    public function getUserEdit($id){
        $u=User::find($id); //Encuentra el id de la categoria para así poder modificarla y tener la ruta /category/x/edit
        $data=['use'=>$u];

        return view('admin.users.edit', $data);
    }

    public function postUserEdit(Request $request, $id){
        $rules=[
            'name'=> 'required',
            'lastname'=>'required',
            'password'=>'required|min:6',
            'email'=>'required|email',
            //unique:users,email
        ];

        $messages=[
            'name.required'=>'Se requiere de un nombre para el Modelo ',
            'lastname.required'=>'Se requiere dar un Apellido',
            'email.required'=>'El correo electrónico es necesario',
            'email.email'=>'El formato de su correo no es válido',
            'password.required'=>'Escriba una contraseña',
            'password.min'=>'La contraseña es poco segura',
        ];
        
        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $u= new User;
            $u= User::find($id); //Ya no se declara new y aparte se indica que el modelo tiene que buscar el id de la categoria
            $u->name=e($request->input('name'));
            $u->lastname=e($request->input('lastname'));
            $u->email=e($request->input('email'));
            $u->password= Hash::make ($request->input('password')); //Encriptación de contraseña
            
            if($u->save()):
                return back()->with('message', 'Usuario editado exitosamente')->with('typealert','success');
            endif;

        endif;
    }

    public function getUserDelete($id){
        $u=User::find($id);
        if($u->delete()):
            return back()->with('message', 'Usuario eliminado')->with('typealert','success');
        endif;
    }

    public function getshowToken(){
        echo csrf_token();
        return csrf_token();
    }
}
