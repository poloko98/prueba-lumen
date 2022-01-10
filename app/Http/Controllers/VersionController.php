<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function index()
    {
        $version = Version::all();
        if ($version) {
            return response()->json([
                'status' => 200,
                'version' => $version,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'versiones no encontradas',
            ]);
        }
    }

    public function view($id){
        $version = Version::where('id',$id)->first();
        if($version){

            return response()->json([
                'status'=> 200,
                'version' => $version,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'version no encontrada'
            ]);
        }
    }

    public function modeloIndex($nombre)
    {
        $modelo = Modelo::where('nombre', $nombre)->first();
        if ($modelo) {
            $version = Version::where('modelo', $modelo->id)->get();
            if ($version) {
                return response()->json([
                    'status' => 200,
                    'version_data' => [
                        'version' => $version,
                        'modelo' => $modelo,
                    ],
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'versiones no encontradas',
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'modelo no encontrado',
            ]);
        }
    }

    public function filtroBlue($bluetooth)
    {
        
            $version = Version::where('bluetooth', $bluetooth)->get();
            if ($version) {
                return response()->json([
                    'status' => 200,
                    'version'=> $version
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'versiones no encontradas',
                ]);
            }
        
    }

    public function filtroCombustible($combustible)
    {
        
            $version = Version::where('tipo_combustible', $combustible)->get();
            if ($version) {
                return response()->json([
                    'status' => 200,
                    'version'=> $version
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'versiones no encontradas',
                ]);
            }
        
    }
}
