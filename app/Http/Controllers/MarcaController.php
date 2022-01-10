<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(){
        $marca = Marca::all();
        if($marca){

            return response()->json([
                'status'=> 200,
                'marca' => $marca,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Marcas no encontradas'
            ]);
        }
        
    }

    public function view($id){
        $marca = Marca::where('id',$id)->first();
        if($marca){

            return response()->json([
                'status'=> 200,
                'marca' => $marca,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Marca no encontrada'
            ]);
        }
    }
}
