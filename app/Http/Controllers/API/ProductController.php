<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function get(){
       /*  try { 
            $data = Product::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        } */
        try { 
            // Incluir la relación con la categoría al recuperar los datos
            $data = Product::with('category')->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
    
  //POST DE PRODUCTOS
  public function create(Request $request)
{
    try {
        $data['id'] = $request['id'];
        $data['title'] = $request['title'];
        $data['price'] = $request['price'];
        $data['description'] = $request['description'];
        $data['creationAt'] = Carbon::parse($request['creationAt'])->format('Y-m-d H:i:s');
        $data['updatedAt'] = Carbon::parse($request['updatedAt'])->format('Y-m-d H:i:s');
        $data['categoryId'] = $request['categoryId'];
        $res = Product::create($data);
        return response()->json($res, 200);
    } catch (\Throwable $th) {
        return response()->json(['error' => $th->getMessage()], 500);
    }
}

    public function getById($id){
        try { 
            $data = Product::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request,$id){
        try { 
            $data['name'] = $request['name'];
            $data['address'] = $request['address'];
            $data['phone'] = $request['phone'];
            Product::find($id)->update($data);
            $res = Product::find($id);
            return response()->json( $res , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
  
    public function delete($id){
        try {       
            $res = Product::find($id)->delete(); 
            return response()->json([ "deleted" => $res ], 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
