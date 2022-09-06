<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator, Hash, Auth, Str;

use App\Models\Product;
use App\Models\Category;

class ContentController extends Controller
{
    public function getHome(){
        $products=Product::where('status', '1')->orderBy('id','desc')->paginate(10);
        $data=['products'=>$products];
        return view('home', $data);
    }
}
