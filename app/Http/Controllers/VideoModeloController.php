<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Video_modelo;
use Illuminate\Http\Request;

class VideoModeloController extends Controller
{
    public function Index($nombre)
    {
        $modelo = Modelo::where('nombre', $nombre)->first();
        if ($modelo) {
            $videos = Video_modelo::where('modelo', $modelo->id)->get();
            if ($videos) {
                return response()->json([
                    'status' => 200,
                    'videos' => $videos,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'El modelo no tiene videos',
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
            $video = Video_modelo::where('modelo', $modelo->id)->where('id',$id)->first();
            if ($video) {
                return response()->json([
                    'status' => 200,
                    'video' => $video,
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Video no encontrado',
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
