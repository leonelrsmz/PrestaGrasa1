<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model

{
    use SoftDeletes; //Borra la tupla en el modelo (no se va a ver ni poder usarse) pero no la borra en la base de datos, esto para no afectar la relacion entre categoria y productos
    //Es por eso que es importante el campo "deleted_at"

    protected $dates=['deleted_at'];
    protected $table = 'categories'; //Tabla de bd
    protected $hidden=['created_at','updated_at']; //Campos ocultos que no queremos que se vean en la tabla

   // use HasFactory;
}
