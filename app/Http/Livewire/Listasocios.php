<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Socio;
use PDF;

class Listasocios extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $soccedula, $socnombre, $socdireccion, $soctelefono, $soccorreo;
    public $updateMode = false;
    public $name = "";
    public $sortColumn = "socnombre";
    public $sortDirection = "ASC";
    protected $queryString = ['name'];
    public $columns = [
        'socnombre'
    ];

    public function render()
    {
        $socios = Socio::OrderBy($this->sortColumn,$this->sortDirection);
        
        if($this->socnombre){
            $socios->where('socnombre','LIKE', $keyWord)
                    ->where('created_at','LIKE', $keyWord);
        }
        
        $socios = $socios->paginate(25);

        return view('livewire.listaSocios.view',['socios'=>$socios]);

        // $keyWord = '%'.$this->keyWord .'%';
        // return view('livewire.listaSocios.view', ['socios'=>$socios], [
        //     //'socios' => Socio::OrderBy($this->sortColumn,$this->sortDirection);
        //     'socios' => Socio::latest()
        //              ->orWhere('socnombre', 'LIKE', $keyWord)
        //                 // ->OrderBy($this->sortColumn,$this->sortDirection)
        //              //->orderBy('socnombre', 'LIKE', $keyWord)
        //              ->paginate(25),
        // ]);

    }

    public function getAllSocios()
    {
        $socios = Socio::all();
        return view('listasocio', compact('socios'));
    }

    public function livewirePdf()
    {
        $keyWord = '%'.$this->keyWord .'%';
        $data = [
                'socios' => Socio::latest()
                            ->orWhere('soccedula', 'LIKE', $keyWord)
                            ->orWhere('socnombre', 'LIKE', $keyWord)
                            ->orWhere('socdireccion', 'LIKE', $keyWord)
                            ->orWhere('soctelefono', 'LIKE', $keyWord)
                            ->orWhere('soccorreo', 'LIKE', $keyWord)
                            ->paginate(25),
        ];
    
        $pdf = \PDF::loadView('livewire.listaSocios.pdf', $data);
    
        return $pdf->download('listaSocios.pdf');
    }

    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc':'asc';
    }
}
