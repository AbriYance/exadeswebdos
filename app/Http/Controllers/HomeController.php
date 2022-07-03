<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;
use App\Models\Alquiler;
use App\Models\Pelicula;
use App\Models\User;
use App\Models\Genero;
use App\Models\Actorpelicula;
use App\Models\Actor;
use App\Models\Formato;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $numSocios = Socio::all()->count();
        $numAlquileres = Alquiler::all()->count();
        $numPeliculas = Pelicula::all()->count();
        $numUsuarios = User::all()->count();
        $numFormatos = Formato::all()->count();

        // ACTORES Y GENEROS POR PELICULAS
        $generos = Genero::all();
        $actores = Actor::all();
        $formatos = Formato::all();
        $peliculas = Pelicula::all();
        $alquileres = Alquiler::all();
        $data = [];

        // GENEROS
        foreach($generos as $genero){
            $data['label'][] = $genero->gennombre;

            $data['data'][] = Pelicula::all()->where('gen_id',$genero->id)->count();
        }

        // ACTORES
        foreach($actores as $actor){
            $data['labelA'][] = $actor->actnombre;

            $data['dataA'][] = Actorpelicula::all()->where('act_id',$actor->id)->take(1)->count();
        }

        // FORMATOS
        foreach($formatos as $formato){
            $data['labelF'][] = $formato->fornombre;

            $data['dataF'][] = Pelicula::all()->where('for_id',$formato->id)->count();
        }
        $data['data'] = json_encode($data);

        // PELICULA MÁS VISTA
        $mayor = [
            'id'=>1,
            'num_alq'=>Alquiler::all()->where('pel_id',1)->count(),
        ];
        for($i = 1 ; $i < Pelicula::all()->count(); $i++){
            $peltop = collect([
                'id'=>$i,
                'num_alq'=>Alquiler::all()->where('pel_id',$i)->count()
            ]);
            if($peltop['num_alq']>$mayor['num_alq']){
                $mayor = $peltop;
            }
        }
        $nombre = [
            'genero'=>(Pelicula::Select('gen_id')->where('id',$mayor['id'])->first()->gen_id),
            'formato'=>(Pelicula::Select('for_id')->where('id',$mayor['id'])->first()->for_id)
        ];
        $datap= [
            'nombre'=>(Pelicula::Select('pelnombre')->where('id',$mayor['id'])->first()->pelnombre),
            'num_alq'=>$mayor['num_alq'],
            'generonombre'=>(Genero::Select('gennombre')->where('id',$nombre['genero'])->first()->gennombre),
            'formatonombre'=>(Formato::Select('fornombre')->where('id',$nombre['formato'])->first()->fornombre)
        ];

        // REGISTROS DE SOCIOS POR MES 2022
        $eneroSocio2022 = Socio::all()->whereBetween('created_at', ['2022-01-01','2022-01-31'])->count();
        $febreroSocio2022 = Socio::all()->whereBetween('created_at', ['2022-02-01','2022-02-28'])->count();
        $marzoSocio2022 = Socio::all()->whereBetween('created_at', ['2022-03-01','2022-03-31'])->count();
        $abrilSocio2022 = Socio::all()->whereBetween('created_at', ['2022-04-01','2022-04-30'])->count();
        $mayoSocio2022 = Socio::all()->whereBetween('created_at', ['2022-05-01','2022-05-31'])->count();
        $junioSocio2022 = Socio::all()->whereBetween('created_at', ['2022-06-01','2022-06-30'])->count();
        $julioSocio2022 = Socio::all()->whereBetween('created_at', ['2022-07-01','2022-07-31'])->count();
        $agostoSocio2022 = Socio::all()->whereBetween('created_at', ['2022-08-01','2022-08-31'])->count();
        $septiembreSocio2022 = Socio::all()->whereBetween('created_at', ['2022-09-01','2022-09-30'])->count();
        $octubreSocio2022 = Socio::all()->whereBetween('created_at', ['2022-10-01','2022-10-31'])->count();
        $noviembreSocio2022 = Socio::all()->whereBetween('created_at', ['2022-11-01','2022-11-30'])->count();
        $diciembreSocio2022 = Socio::all()->whereBetween('created_at', ['2022-12-01','2022-12-31'])->count();
        // REGISTROS DE SOCIOS POR MES 2021
        $eneroSocio2021 = Socio::all()->whereBetween('created_at', ['2021-01-01','2021-01-31'])->count();
        $febreroSocio2021 = Socio::all()->whereBetween('created_at', ['2021-02-01','2021-02-28'])->count();
        $marzoSocio2021 = Socio::all()->whereBetween('created_at', ['2021-03-01','2021-03-31'])->count();
        $abrilSocio2021 = Socio::all()->whereBetween('created_at', ['2021-04-01','2021-04-30'])->count();
        $mayoSocio2021 = Socio::all()->whereBetween('created_at', ['2021-05-01','2021-05-31'])->count();
        $junioSocio2021 = Socio::all()->whereBetween('created_at', ['2021-06-01','2021-06-30'])->count();
        $julioSocio2021 = Socio::all()->whereBetween('created_at', ['2021-07-01','2021-07-31'])->count();
        $agostoSocio2021 = Socio::all()->whereBetween('created_at', ['2021-08-01','2021-08-31'])->count();
        $septiembreSocio2021 = Socio::all()->whereBetween('created_at', ['2021-09-01','2021-09-30'])->count();
        $octubreSocio2021 = Socio::all()->whereBetween('created_at', ['2021-10-01','2021-10-31'])->count();
        $noviembreSocio2021 = Socio::all()->whereBetween('created_at', ['2021-11-01','2021-11-30'])->count();
        $diciembreSocio2021 = Socio::all()->whereBetween('created_at', ['2021-12-01','2021-12-31'])->count();
        

        // REGISTROS DE ALQUILERES POR MES 2022
        $eneroAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-01-01','2022-01-31'])->count();
        $febreroAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-02-01','2022-02-28'])->count();
        $marzoAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-03-01','2022-03-31'])->count();
        $abrilAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-04-01','2022-04-30'])->count();
        $mayoAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-05-01','2022-05-31'])->count();
        $junioAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-06-01','2022-06-30'])->count();
        $julioAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-07-01','2022-07-31'])->count();
        $agostoAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-08-01','2022-08-31'])->count();
        $septiembreAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-09-01','2022-09-30'])->count();
        $octubreAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-10-01','2022-10-31'])->count();
        $noviembreAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-11-01','2022-11-30'])->count();
        $diciembreAlquiler2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-12-01','2022-12-31'])->count();
        // REGISTROS DE ALQUILERES POR MES 2021
        $eneroAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-01-01','2021-01-31'])->count();
        $febreroAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-02-01','2021-02-28'])->count();
        $marzoAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-03-01','2021-03-31'])->count();
        $abrilAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-04-01','2021-04-30'])->count();
        $mayoAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-05-01','2021-05-31'])->count();
        $junioAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-06-01','2021-06-30'])->count();
        $julioAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-07-01','2021-07-31'])->count();
        $agostoAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-08-01','2021-08-31'])->count();
        $septiembreAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-09-01','2021-09-30'])->count();
        $octubreAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-10-01','2021-10-31'])->count();
        $noviembreAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-11-01','2021-11-30'])->count();
        $diciembreAlquiler2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-12-01','2021-12-31'])->count();

        // REGISTROS DE ALQUILERES POR MES e Ingreso 2022
        $eneroIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-01-01','2022-01-31'])->sum('alqcosto');
        $febreroIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-02-01','2022-02-28'])->sum('alqcosto');
        $marzoIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-03-01','2022-03-31'])->sum('alqcosto');
        $abrilIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-04-01','2022-04-30'])->sum('alqcosto');
        $mayoIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-05-01','2022-05-31'])->sum('alqcosto');
        $junioIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-06-01','2022-06-30'])->sum('alqcosto');
        $julioIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-07-01','2022-07-31'])->sum('alqcosto');
        $agostoIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-08-01','2022-08-31'])->sum('alqcosto');
        $septiembreIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-09-01','2022-09-30'])->sum('alqcosto');
        $octubreIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-10-01','2022-10-31'])->sum('alqcosto');
        $noviembreIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-11-01','2022-11-30'])->sum('alqcosto');
        $diciembreIngresoA2022 = Alquiler::all()->whereBetween('alqfechadesde', ['2022-12-01','2022-12-31'])->sum('alqcosto');
        // REGISTROS DE ALQUILERES POR MES e Ingreso 2021
        $eneroIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-01-01','2021-01-31'])->sum('alqcosto');
        $febreroIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-02-01','2021-02-28'])->sum('alqcosto');
        $marzoIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-03-01','2021-03-31'])->sum('alqcosto');
        $abrilIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-04-01','2021-04-30'])->sum('alqcosto');
        $mayoIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-05-01','2021-05-31'])->sum('alqcosto');
        $junioIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-06-01','2021-06-30'])->sum('alqcosto');
        $julioIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-07-01','2021-07-31'])->sum('alqcosto');
        $agostoIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-08-01','2021-08-31'])->sum('alqcosto');
        $septiembreIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-09-01','2021-09-30'])->sum('alqcosto');
        $octubreIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-10-01','2021-10-31'])->sum('alqcosto');
        $noviembreIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-11-01','2021-11-30'])->sum('alqcosto');
        $diciembreIngresoA2021 = Alquiler::all()->whereBetween('alqfechadesde', ['2021-12-01','2021-12-31'])->sum('alqcosto');
        $sumaIngresos = Alquiler::all()->sum('alqcosto');


        return view('home', [
            'numSocios' => $numSocios,
            'numAlquileres' => $numAlquileres,
            'numPeliculas' => $numPeliculas,
            'numUsuarios' => $numUsuarios,
            'numFormatos' => $numFormatos,
            'generos' => $generos,
            'datap' => $datap,
            'sumaIngresos' => $sumaIngresos,

            //SOCIOS 2021
            'eneroSocio2021' => $eneroSocio2021,
            'febreroSocio2021' => $febreroSocio2021,
            'marzoSocio2021' => $marzoSocio2021,
            'abrilSocio2021' => $abrilSocio2021,
            'mayoSocio2021' => $mayoSocio2021,
            'junioSocio2021' => $junioSocio2021,
            'julioSocio2021' => $julioSocio2021,
            'agostoSocio2021' => $agostoSocio2021,
            'septiembreSocio2021' => $septiembreSocio2021,
            'octubreSocio2021' => $octubreSocio2021,
            'noviembreSocio2021' => $noviembreSocio2021,
            'diciembreSocio2021' => $diciembreSocio2021,

            //SOCIOS 2022
            'eneroSocio2022' => $eneroSocio2022,
            'febreroSocio2022' => $febreroSocio2022,
            'marzoSocio2022' => $marzoSocio2022,
            'abrilSocio2022' => $abrilSocio2022,
            'mayoSocio2022' => $mayoSocio2022,
            'junioSocio2022' => $junioSocio2022,
            'julioSocio2022' => $julioSocio2022,
            'agostoSocio2022' => $agostoSocio2022,
            'septiembreSocio2022' => $septiembreSocio2022,
            'octubreSocio2022' => $octubreSocio2022,
            'noviembreSocio2022' => $noviembreSocio2021,
            'diciembreSocio2022' => $diciembreSocio2022,

            //ALQUILERES 2021
            'eneroAlquiler2021' => $eneroAlquiler2021,
            'febreroAlquiler2021' => $febreroAlquiler2021,
            'marzoAlquiler2021' => $marzoAlquiler2021,
            'abrilAlquiler2021' => $abrilAlquiler2021,
            'mayoAlquiler2021' => $mayoAlquiler2021,
            'junioAlquiler2021' => $junioAlquiler2021,
            'julioAlquiler2021' => $julioAlquiler2021,
            'agostoAlquiler2021' => $agostoAlquiler2021,
            'septiembreAlquiler2021' => $septiembreAlquiler2021,
            'octubreAlquiler2021' => $octubreAlquiler2021,
            'noviembreAlquiler2021' => $noviembreAlquiler2021,
            'diciembreAlquiler2021' => $diciembreAlquiler2021,

            //ALQUILERES 2022
            'eneroAlquiler2022' => $eneroAlquiler2022,
            'febreroAlquiler2022' => $febreroAlquiler2022,
            'marzoAlquiler2022' => $marzoAlquiler2022,
            'abrilAlquiler2022' => $abrilAlquiler2022,
            'mayoAlquiler2022' => $mayoAlquiler2022,
            'junioAlquiler2022' => $junioAlquiler2022,
            'julioAlquiler2022' => $julioAlquiler2022,
            'agostoAlquiler2022' => $agostoAlquiler2022,
            'septiembreAlquiler2022' => $septiembreAlquiler2022,
            'octubreAlquiler2022' => $octubreAlquiler2022,
            'noviembreAlquiler2022' => $noviembreAlquiler2021,
            'diciembreAlquiler2022' => $diciembreAlquiler2022,

            //INGRESOS 2021
            'eneroIngresoA2021' => $eneroIngresoA2021,
            'febreroIngresoA2021' => $febreroIngresoA2021,
            'marzoIngresoA2021' => $marzoIngresoA2021,
            'abrilIngresoA2021' => $abrilIngresoA2021,
            'mayoIngresoA2021' => $mayoIngresoA2021,
            'junioIngresoA2021' => $junioIngresoA2021,
            'julioIngresoA2021' => $julioIngresoA2021,
            'agostoIngresoA2021' => $agostoIngresoA2021,
            'septiembreIngresoA2021' => $septiembreIngresoA2021,
            'octubreIngresoA2021' => $octubreIngresoA2021,
            'noviembreIngresoA2021' => $noviembreIngresoA2021,
            'diciembreIngresoA2021' => $diciembreIngresoA2021,

            //INGRESOS 2022
            'eneroIngresoA2022' => $eneroIngresoA2022,
            'febreroIngresoA2022' => $febreroIngresoA2022,
            'marzoIngresoA2022' => $marzoIngresoA2022,
            'abrilIngresoA2022' => $abrilIngresoA2022,
            'mayoIngresoA2022' => $mayoIngresoA2022,
            'junioIngresoA2022' => $junioIngresoA2022,
            'julioIngresoA2022' => $julioIngresoA2022,
            'agostoIngresoA2022' => $agostoIngresoA2022,
            'septiembreIngresoA2022' => $septiembreIngresoA2022,
            'octubreIngresoA2022' => $octubreIngresoA2022,
            'noviembreIngresoA2022' => $noviembreIngresoA2022,
            'diciembreIngresoA2022' => $diciembreIngresoA2022,


        ], $data);
    }
}
