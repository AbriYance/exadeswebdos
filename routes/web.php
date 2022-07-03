<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Listasocios;
use App\Http\Livewire\RInventarioPeliculas;
use App\Http\Livewire\Alquilersocios;
use App\Http\Livewire\Gananciasmensuales;
use App\Http\Livewire\Alquilergeneros;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\admin::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/home', function () {
//     return view('home');
// })->middleware('auth');

//Route Hooks - Do not delete//
	Route::view('alquilers', 'livewire.alquilers.index')->middleware('auth');
	Route::view('socios', 'livewire.socios.index')->middleware('auth');
	Route::view('actorpeliculas', 'livewire.actorpeliculas.index')->middleware('auth');
	Route::view('peliculas', 'livewire.peliculas.index')->middleware('auth');
	Route::view('formatos', 'livewire.formatos.index')->middleware('auth');
	Route::view('directors', 'livewire.directors.index')->middleware('auth');
	Route::view('generos', 'livewire.generos.index')->middleware('auth');
	Route::view('actors', 'livewire.actors.index')->middleware('auth');
	Route::view('sexos', 'livewire.sexos.index')->middleware('auth');
	Route::view('rinventariopeliculas', 'livewire.inventarioPeliculas.index')->middleware('auth');
	Route::view('listasocios', 'livewire.listaSocios.index')->middleware('auth');
	Route::view('alquilersocios', 'livewire.alquilerSocio.index')->middleware('auth');
	Route::view('gananciasmensuales', 'livewire.gananciasMensuales.index')->middleware('auth');
	Route::view('alquilergeneros', 'livewire.alquilerGeneros.index')->middleware('auth');


// pdf
Route::get('/listasocios/pdf', [Listasocios::class, 'livewirePdf'])->name('listasocios/pdf');
Route::get('/listapeliculas/pdf', [RInventarioPeliculas::class, 'livewirePdf'])->name('listapeliculas/pdf');
Route::get('/alquilersocios/pdf', [Alquilersocios::class, 'livewirePdf'])->name('alquilersocios/pdf');
Route::get('/gananciasgeneros/pdf', [Alquilersocios::class, 'livewirePdf'])->name('gananciasgeneros/pdf');
Route::get('/alquilergeneros/pdf', [Alquilersocios::class, 'livewirePdf'])->name('alquilergeneros/pdf');
// Route::view('listasocios/pdf', 'livewire.listaSocios.pdf')->middleware('auth');