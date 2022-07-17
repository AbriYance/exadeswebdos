<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Alquilersocios;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sociosLista',[Alquilersocios::class, 'postmanSocio']);
Route::get('peliculasLista',[Alquilersocios::class, 'postmanPeliculas']);
Route::get('direccionSocios',[Alquilersocios::class, 'postmanDireccionSocio']);
Route::get('cedulaSocios',[Alquilersocios::class, 'postmanCedulaSocio']);
Route::get('alquilerLista',[Alquilersocios::class, 'postmanAlquiler']);

