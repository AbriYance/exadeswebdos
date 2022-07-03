<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alquiler;
use App\Models\Socio;
use App\Models\Pelicula;

class Gananciasmensuales extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $soc_id, $pel_id, $alqfechadesde, $alqfechahasta, $alqcosto, $alqfechaentrega;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $socios = Socio::pluck('socnombre', 'id');
        $peliculas = Pelicula::pluck('pelnombre', 'id');
        return view('livewire.alquilerSocio.view', ['socios' => $socios, 'peliculas' => $peliculas],[
            'alquilers' => Alquiler::latest()
						->where('soc_id', 'LIKE', $keyWord)
						->paginate(20),
        ]);

        // $keyWord = '%'.$this->keyWord .'%';
        // $socios = Socio::pluck('socnombre', 'id');
        // $peliculas = Pelicula::pluck('pelnombre', 'id');
        // return view('livewire.alquilerSocio.view', ['socios' => $socios, 'peliculas' => $peliculas],[
        //     'alquilers' => Alquiler::latest()
		// 				->orWhere('soc_id', 'LIKE', $keyWord)
		// 				->orWhere('pel_id', 'LIKE', $keyWord)
		// 				->orWhere('alqfechadesde', 'LIKE', $keyWord)
		// 				->orWhere('alqfechahasta', 'LIKE', $keyWord)
		// 				->orWhere('alqcosto', 'LIKE', $keyWord)
		// 				->orWhere('alqfechaentrega', 'LIKE', $keyWord)
		// 				->paginate(10),
        // ]);
    }

    public function livewirePdf()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $data = [
            'alquilers' => Alquiler::latest()
                            ->paginate(1000),
        ];
    
        $pdf = \PDF::loadView('livewire.alquilerSocio.pdf', $data);
    
        return $pdf->download('alquilerSocios.pdf');
    }
}
