<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\Director;
use App\Models\Formato;

class RInventarioPeliculas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $gen_id, $dir_id, $for_id, $pelnombre, $pelcosto, $pelfechaestreno;
    public $updateMode = false;

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $generos = Genero::pluck('gennombre', 'id');
        $directors = Director::pluck('dirnombre', 'id');
        $formatos = Formato::pluck('fornombre', 'id');
        return view('livewire.inventarioPeliculas.view',['generos' => $generos,'directors' => $directors,'formatos' => $formatos],[
            'peliculas' => Pelicula::latest()
						->orWhere('gen_id', 'LIKE', $keyWord)
						->orWhere('dir_id', 'LIKE', $keyWord)
						->orWhere('for_id', 'LIKE', $keyWord)
						->orWhere('pelnombre', 'LIKE', $keyWord)
						->orWhere('pelcosto', 'LIKE', $keyWord)
						->orWhere('pelfechaestreno', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function livewirePdf()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $data = [
            'peliculas' => Pelicula::latest()
                ->orWhere('pelnombre', 'LIKE', $keyWord)
                ->orWhere('gen_id', 'LIKE', $keyWord)
                ->orWhere('dir_id', 'LIKE', $keyWord)
                ->orWhere('for_id', 'LIKE', $keyWord)
                ->orWhere('pelfechaestreno', 'LIKE', $keyWord)
                ->paginate(1000),
        ];
    
        $pdf = \PDF::loadView('livewire.inventarioPeliculas.pdf', $data);
    
        return $pdf->download('listaPeliculas.pdf');
    }
}
