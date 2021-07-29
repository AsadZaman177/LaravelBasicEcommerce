<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
  function index(){

    $product = products::all();
  
    return view('products',compact('product'));

  }

  function detail($id){

    $data = products::find($id);

    return view('detail',['product'=>$data]);
  }
}
