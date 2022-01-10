<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->group(['prefix' => 'api'], function () use ($router) {

    //lista de marcas
    $router->get('/marcas', 'MarcaController@index');
    //ver una marca
    $router->get('/marcas/{id}', 'MarcaController@view');

    //lista de modelos
    $router->get('/modelo', 'ModeloController@index');
    //ver un modelo
    $router->get('/modelo/{id}', 'ModeloController@view');
    //lista de modelos por marca
    $router->get('/marcas/{nombre}', 'ModeloController@marcaIndex');

    //imagenes de un modelo
    $router->get('/{nombre}/imagenes', 'ImagenModeloController@index');
    //ver una imagen de un modelo
    $router->get('/{nombre}/imagen/{id}', 'ImagenModeloController@view');

    //videos de un modelo
    $router->get('/{nombre}/videos', 'VideoModeloController@index');
    //ver un video de un modelo
    $router->get('/{nombre}/video/{id}', 'VideoModeloController@view');

    //lista de versiones
    $router->get('/versiones', 'VersionController@Index');
    //lista de versiones de un modelo
    $router->get('/modelo/{nombre}', 'VersionController@modeloIndex');
    //ver una version
    $router->get('/version/{id}', 'VersionController@view');
    //lista filtrada de versiones con bluetooth
    $router->get('/version?bluetooth={bluetooth}', 'VersionController@filtroBlue');
    //lista filtrada de versiones con combustible
    $router->get('/version?combustible={combustible}', 'VersionController@filtroCombustible');
});
