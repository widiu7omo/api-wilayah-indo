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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'],function() use ($router){
    $router->get("kabupatens",function(){
        $results = app("db")->select("SELECT * FROM wilayah WHERE kode LIKE ? AND LENGTH(kode) = ?",['63.%',5]);
        return response()->json($results);
    });
    $router->get("kecamatan/{kode}",function($kode){
        $kode = $kode."%";
        $results = app("db")->select("SELECT * FROM wilayah WHERE kode LIKE ? AND LENGTH(kode) = ?",[$kode,8]);
        return response()->json($results);
    });
    $router->get("desa/{kode}",function($kode){
        $kode = $kode."%";
        $results = app("db")->select("SELECT * FROM wilayah WHERE kode LIKE ? AND LENGTH(kode) = ?",[$kode,13]);
        return response()->json($results);
    });
});
