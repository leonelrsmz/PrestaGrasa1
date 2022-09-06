<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Clase de validación de Laravel
use Validator, Hash, Auth;
use App\Models\User;

class ConexionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function __construct(){ 
        $this->middleware('guest')->except(['getLogout']); //Arreglo en donde indicamos los métodos que no queremos que se ejecute este middleware
    }


    public function getLogin(){
        return view('conexion.login');
    }

    public function getRegister(){
        return view('conexion.register');
    }

    public function postLogin(Request $request){
        $rules=[
            'email'=>'required|email',
            'password'=>'required',
        
        ];

        $messages = [
            'email.required'=>'Su correo electrónico es requerido.',
            'email.email'=>'El formato de su correo electrónico es inválido',
            'password.required'=>'Escriba su contraseña',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else://Validación de autenticación de credenciales
            
            //El condicional compara el hash que esta contenido en la base de datos con el que el usuario ingresa
            if(Auth::attempt(['email'=> $request->input('email'), 'password'=>$request->input('password')], true)):
                return redirect('/'); //Se manda a la página principal de la app
            else:
                return back()->with('message','Correo o contraseña incorrecta')->with('typealert','danger');
            endif;

        endif;
    }

    public function postRegister(Request $request){ 
        
        $rules=[
            'name'=>'required',
            'lastname'=> 'required',
            'email'=> 'required|email|unique:users,email', 
            'password' => 'required|min:6', 
            'repassword' => 'required|min:6|same:password', 
        ];

        //Mensajes personalizados para el validator
        $messages=[
            'name.required'=>'El nombre es requerido',
            'lastname.required'=>'El apellido es requerido',
            'email.required'=>'El correo electrónico es necesario',
            'email.email'=>'El formato de su correo no es válido',
            'password.required'=>'Escriba una contraseña',
            'password.min'=>'La contraseña es muy poco segura',
            'repassword.required'=>'Es necesario que confirme su contraseña',
            'repassword.min'=>'Contraseña muy poco segura',
            'repassword.same'=>'Las contraseñas no coinciden'
        ];

        //Se manda a llamar la calse validator para generar la petición a todo, en donde se implementen las reglas que creamos
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            //Si no falló... Enviar a la base de datos
            $user= new User;
            $user->name=e($request->input('name')); //Evita que en los campos se intriduzcan scripts maliciosos con  e()
            $user->lastname=e($request->input('lastname'));
            $user->email=e($request->input('email'));
            $user->password= Hash::make ($request->input('password')); //Encriptación de contraseña
            $user->rol=$request->input('rol');

            if ($user->save()):
                return redirect('/login')->with('message','Usuario creado con éxito')->with('typealert','success');
            endif;

        endif;
        
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
