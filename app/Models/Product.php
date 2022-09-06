<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $dates=['deleted_at'];
    protected $table = 'products'; //Tabla de bd
    protected $hidden=['created_at','updated_at']; //Campos ocultos que no queremos que se vean en la tabla
    //use HasFactory;

    public function cat(){ //Funcion encargada de mostrar la relación 1:1 (Categoria como llave foranea en Produc)
        return $this->hasOne(Category::class,'id','category_id');
    }
}
