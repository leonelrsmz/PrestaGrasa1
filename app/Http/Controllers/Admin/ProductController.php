<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Hash, Auth, Str, Config, Image;

use App\Models\Product; //Se manda a llamar este modelo dado que en apartado "Modelo:" de product/add se asigna un valor
use App\Models\Category;

class ProductController extends Controller
{
    public function __Construct(){ //Retorna al inicio si es que el usuario no tiene los permisos de adminsitrador
        $this->middleware('auth'); //Midleware basico de autenticacion
        $this->middleware('isadmin'); //El que creamos en la carpeta middleware IsAdmin y el que referenciamos en el kernel
    } //Como lo indica el archivo isAdmin, si el usuario no es 0, lo retorna a la página principal

    public function getHome($status){ //Listar los sneakers en esta vista 
        switch ($status){
            case '0':
                $products=Product::with(['cat'])->where('status', '0')->orderBy('id','desc')->paginate(10);
            break;
                
            case '1':
                $products=Product::with(['cat'])->where('status', '1')->orderBy('id','desc')->paginate(10);
            break;
            
            case 'a':
                $products=Product::with(['cat'])->orderBy('id','desc')->paginate(10);
            default:

            break;
        }
        
        $data=['products'=>$products];

        return view('admin.products.home', $data);
    }

    public function getProductAdd(){
        //PENDIENTE: Agregar en la varaible cat, los parámetros de todas las categorías independientemente del modulo
        $cats=Category::where('module','0')->pluck('name','id'); //Se busca el modulo por defecto de las categorias "0" streetwear
        $data=['cats'=>$cats];
        return View('admin.products.add', $data);
    }

    public function postProductAdd(Request $request){
        $rules=[
            'name'=> 'required',
            'img'=>'required', //Aparte de ser requerido, necesita ser imagen
            'price'=>'required',
            'size'=>'required'
        ];

        $messages=[
            'name.required'=>'El nombre del sneaker es requerido',
            'img.required'=>'Seleccione una imagen para el sneaker',
            "img.image"=>'El archivo que sube no es una imagen',
            'price.required'=>'Ingrese el precio del sneaker',
            'size.required'=>'Ingrese la talla del sneaker'
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput(); //El withInput hace que cuando surja el error, no se reseteen todos los campos llenados
        else:
            //Uso del sistema de archivos de laravel para guardar imagenes
            $path='/'.date('Y-m-d');  //Ruta absoluta de folder de las últimas 2 carpetas a donde el archivo va a ir a parar
            $fileExt=trim($request->file('img')->getClientOriginalExtension()); //Elimina espacios en blanco antes y despues
            $upload_path=Config::get('filesystems.disks.uploads.root'); //Asignación de ruta local para la carpeta uploads
            $name=Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName())); //Extraer el nombre de la imagen y eliminar caracteres especiales ni espacios

            $filename=rand(1,999).'-'.$name.'.'.$fileExt; //Evita que se sobreescriban los archivos
            $file_file=$upload_path.'/'.$path.'/'.$filename; //Va a contener la ruta absoluta de donde nosotros guardamos

            $product=new Product;
            $product->status='0'; //El estado 0 representa que es un producto borrador
            $product->name=e($request->input('name'));
            $product->slug=Str::slug($request->input('name')); //Mismo nombre en texto plano (Sin mayusculas, simbolos, etc)
            $product->category_id=$request->input('category');
            $product->file_path=date('Y-m-d'); //Campo agregado en nueva migración
            $product->image=$filename;
            $product->price=$request->input('price');
            $product->in_discount=$request->input('indiscount');
            $product->discount=$request->input('discount');
            $product->content=e($request->input('content'));
            $product->brand=e($request->input('brand'));
            $product->artist=e($request->input('artist'));
            $product->size=$request->input('size');
           
            
            if($product->save()):
                if($request->hasFile('img')):
                    $f1=$request->img->storeAs($path,$filename,'uploads');
                    $img=Image::make($file_file); //Se llena la variable, una vez ya se haya guardado la imagen
                    $img->fit(256,256, function($constraint){ //Anchura y altura de la imagen por defecto
                        $constraint->upsize(); //Miniatura
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return redirect('/admin/products/a')->with('message', 'Sneaker guardado exitosamente')->with('typealert','success');
            endif;

        endif;
    }

    public function getProductEdit($id){
        $p=Product::find($id); //Primeramente se busca el producto al que tiene asignado el id para poder editarlo

        $cats=Category::where('module','0')->pluck('name','id');
        $data=['cats'=>$cats, 'p'=>$p];
        return view('admin.products.edit', $data);
    }

    public function postProductEdit($id,Request $request){
        $rules=[
            'name'=> 'required',
            'price'=>'required',
            'size'=>'required'
        ];

        $messages=[
            'name.required'=>'El nombre del sneaker es requerido',
            "img.image"=>'El archivo que sube no es una imagen',
            'price.required'=>'Ingrese el precio del sneaker',
            'size.required'=>'Ingrese la talla del sneaker'
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput(); //El withInput hace que cuando surja el error, no se reseteen todos los campos llenados
        else:
        
            $product= Product::find($id);
            $product->status=$request->input('status'); //El estado 0 representa que es un producto borrador
            $product->name=e($request->input('name'));
            $product->slug=Str::slug($request->input('name')); //Mismo nombre en texto plano (Sin mayusculas, simbolos, etc)
            $product->category_id=$request->input('category');
           
            if($request->hasFile('img')): //Solo se actualizará si seleccionamos un archivo, si no se agrega no se actualiza
                    //Uso del sistema de archivos de laravel para guardar imagenes
                $path='/'.date('Y-m-d');  //Ruta absoluta de folder de las últimas 2 carpetas a donde el archivo va a ir a parar
                $fileExt=trim($request->file('img')->getClientOriginalExtension()); //Elimina espacios en blanco antes y despues
                $upload_path=Config::get('filesystems.disks.uploads.root'); //Asignación de ruta local para la carpeta uploads
                $name=Str::slug(str_replace($fileExt,'',$request->file('img')->getClientOriginalName())); //Extraer el nombre de la imagen y eliminar caracteres especiales ni espacios

                $filename=rand(1,999).'-'.$name.'.'.$fileExt; //Evita que se sobreescriban los archivos
                $file_file=$upload_path.'/'.$path.'/'.$filename; //Va a contener la ruta absoluta de donde nosotros guardamos
                
                $product->file_path=date('Y-m-d'); //Campo agregado en nueva migración
                $product->image=$filename;
            endif;

            $product->price=$request->input('price');
            $product->in_discount=$request->input('indiscount');
            $product->discount=$request->input('discount');
            $product->content=e($request->input('content'));
            $product->brand=e($request->input('brand'));
            $product->artist=e($request->input('artist'));
            $product->size=$request->input('size');
           
            
            if($product->save()):
                if($request->hasFile('img')):
                    $f1=$request->img->storeAs($path,$filename,'uploads');
                    $img=Image::make($file_file); //Se llena la variable, una vez ya se haya guardado la imagen
                    $img->fit(256,256, function($constraint){ //Anchura y altura de la imagen por defecto
                        $constraint->upsize(); //Miniatura
                    });
                    $img->save($upload_path.'/'.$path.'/t_'.$filename);
                endif;
                return back()->with('message', 'Elemento actualizado')->with('typealert','success');
            endif;

        endif;


    }

    public function postProductSearch(Request $request){
        $rules=[
            'search'=> 'required',
        ];

        $messages=[
            'search.required'=>'Necesita llenar el campo',
        ];

        $validator=Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger')->withInput(); //El withInput hace que cuando surja el error, no se reseteen todos los campos llenados
        else:
            if($request->input('search')):
                $products=Product::where('name','LIKE','%'.$request->input('search').'%')->orderBy('id','desc')->paginate(10)->get();
            endif;
        $data=['products'=>$products];
        return view('admin.products.search', $data);
        endif;
    }

    public function getProductDelete($id){
        $p=Product::find($id);
        if($p->delete()):
            return back()->with('message', 'Sneaker Eliminado')->with('typealert','success');
        else:
            
        endif;
        
    }

    
}

