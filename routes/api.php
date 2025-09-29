<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\HelloWorldController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('hello/{name}', function ($name) {
//     return 'Hello, ' . $name;
// });

// Route::get('hello/{name}', 'HelloWorldController@helloName');

Route::get('hello/{name}', [HelloWorldController::class, 'helloName']);

Route::post('hello-post', function () {
    return 'Hello World-POST';
});

//rota para listar todas as bandas
Route::get('bands', [BandController::class, 'getALL']);

//rota para listar uma banda pelo id
Route::get('bands/{id}  ', [BandController::class, 'getById']);

//rota para listar uma banda pelo gênero
Route::get('bands/genero/{genero}', [BandController::class, 'getByGenero']);

Route::post('banda-post');