<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\User;
use App\Models\Genero;

class admin extends Controller
{
    //
    public function index()
    {
        $numSocios = Socio::all()->count();
        $numAlquileres = Alquiler::all()->count();
        $numPeliculas = Pelicula::all()->count();
        $numUsuarios = User::all()->count();
        
        $generosPel = Pelicula::where("gen_id","=",1)->count();
        
        return view('home', [
            'Socio' => $numSocios,
            'Alquiler' => $numAlquileres,
            'Pelicula' => $numPeliculas,
            'User' => $numUsuarios,
            'Pelicula2' => $generosPel,
        ]);

    }

}
