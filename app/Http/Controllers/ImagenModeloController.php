<?php

namespace App\Http\Controllers;

use App\Models\Imagen_modelo;
use App\Models\Modelo;

class ImagenModeloController extends Controller
{
    public function Index($nombre)
    {
        $modelo = Modelo::where('nombre', $nombre)->first();
        if ($modelo) {
            $imagenes = Imagen_modelo::where('modelo', $modelo->id)->get();
            if ($imagenes) {
                return response()->json([
                    'status' => 200,
                    'imagenes' => $imagenes,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'El modelo no tiene imagenes',
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'modelo no encontrado',
            ]);
        }
    }
    public function view($nombre, $id){

        $modelo = Modelo::where('nombre', $nombre)->first();
        if ($modelo) {
            $imagen = Imagen_modelo::where('modelo', $modelo->id)->where('id',$id)->first();
            if ($imagen) {
                return response()->json([
                    'status' => 200,
                    'imagen' => $imagen,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Imagen no encontrada',
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'modelo no encontrado',
            ]);
        }
    }

}
