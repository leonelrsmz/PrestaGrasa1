<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//Clases de validación de Laravel
use Validator, Hash, Auth, Str;

use App\Models\Category;

class CategoriesController extends Controller
{
    public function __Construct(){ //Retorna al inicio si es que el usuario no tiene los permisos de adminsitrador
        $this->middleware('auth'); //Midleware basico de autenticacion
        $this->middleware('isadmin'); //El que creamos en la carpeta middleware IsAdmin y el que referenciamos en el kernel
    } //Como lo indica el archivo isAdmin, si el usuario no es 0, lo retorna a la página principal

    public function getHome($module){
        $cats=Category::where('module',$module)->orderBy('name','Asc')->get(); //Se declara el modulo por defecto al entrar a categories/x
        $data=['cats'=>$cats];

        return view('admin.categories.home', $data);
    }

    public function postCategoryAdd(Request $request){
        $rules=[
            'name'=> 'required',

        ];

        $messages=[
            'name.required'=>'Se requiere de un nombre para el Modelo ',
        ];
        
        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $c=new Category;
            $c->module=$request->input('module');
            $c->name=e($request->input('name'));
            $c->slug=Str::slug($request->input('name')); //Mismo nombre en texto plano (Sin mayusculas, simbolos, etc)
            $c->icono=e($request->input('icon'));
            
            if($c->save()):
                return back()->with('message', 'Categoría guardada exitosamente')->with('typealert','success');
            endif;

        endif;
    }

    public function getCategoryEdit($id){
        $cat=Category::find($id); //Encuentra el id de la categoria para así poder modificarla y tener la ruta /category/x/edit
        $data=['cat'=>$cat];

        return view('admin.categories.edit', $data);
    }

    public function postCategoryEdit(Request $request, $id){
        $rules=[
            'name'=> 'required',

        ];

        $messages=[
            'name.required'=>'Se requiere de un nombre para el Modelo ',
        ];
        
        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $c=Category::find($id); //Ya no se declara new y aparte se indica que el modelo tiene que buscar el id de la categoria
            $c->module=$request->input('module');
            $c->name=e($request->input('name'));
            $c->icono=e($request->input('icon'));
            
            if($c->save()):
                return back()->with('message', 'Categoría guardada exitosamente')->with('typealert','success');
            endif;

        endif;
    }

    public function getCategoryDelete($id){
        $c=Category::find($id);
        if($c->delete()):
            return back()->with('message', 'Eliminado exitosamente')->with('typealert','success');
        endif;
    }
}
