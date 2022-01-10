<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Modelo;

class ModeloController extends Controller
{
    public function index()
    {
        $modelo = Modelo::all();
        if ($modelo) {
            return response()->json([
                'status' => 200,
                'modelo' => $modelo,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Modelos no encontrados',
            ]);
        }
    }

    public function marcaIndex($nombre)
    {
        $marca = Marca::where('nombre', $nombre)->first();
        if ($marca) {
            $modelo = Modelo::where('Marca', $marca->id)->get();
            if ($modelo) {
                return response()->json([
                    'status' => 200,
                    'modelo_data' => [
                        'modelo' => $modelo,
                        'marca' => $marca,
                    ],
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'modelo no encontrado',
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'marca no encontrada',
            ]);
        }
    }

    public function view($id){
        $modelo = Modelo::where('id',$id)->first();
        if($modelo){

            return response()->json([
                'status'=> 200,
                'modelo' => $modelo,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'modelo no encontrado'
            ]);
        }
    }
}
