<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\Director;
use App\Models\Formato;

class Peliculas extends Component
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
        return view('livewire.peliculas.view',['generos' => $generos,'directors' => $directors,'formatos' => $formatos],[
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
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->gen_id = null;
		$this->dir_id = null;
		$this->for_id = null;
		$this->pelnombre = null;
		$this->pelcosto = null;
		$this->pelfechaestreno = null;
    }

    public function store()
    {
        $this->validate([
		'gen_id' => 'required',
		'dir_id' => 'required',
		'for_id' => 'required',
		'pelnombre' => 'required',
		'pelcosto' => 'required',
		'pelfechaestreno' => 'required',
        ]);

        Pelicula::create([ 
			'gen_id' => $this-> gen_id,
			'dir_id' => $this-> dir_id,
			'for_id' => $this-> for_id,
			'pelnombre' => $this-> pelnombre,
			'pelcosto' => $this-> pelcosto,
			'pelfechaestreno' => $this-> pelfechaestreno
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Pelicula Successfully created.');
    }

    public function edit($id)
    {
        $record = Pelicula::findOrFail($id);

        $this->selected_id = $id; 
		$this->gen_id = $record-> gen_id;
		$this->dir_id = $record-> dir_id;
		$this->for_id = $record-> for_id;
		$this->pelnombre = $record-> pelnombre;
		$this->pelcosto = $record-> pelcosto;
		$this->pelfechaestreno = $record-> pelfechaestreno;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'gen_id' => 'required',
		'dir_id' => 'required',
		'for_id' => 'required',
		'pelnombre' => 'required',
		'pelcosto' => 'required',
		'pelfechaestreno' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pelicula::find($this->selected_id);
            $record->update([ 
			'gen_id' => $this-> gen_id,
			'dir_id' => $this-> dir_id,
			'for_id' => $this-> for_id,
			'pelnombre' => $this-> pelnombre,
			'pelcosto' => $this-> pelcosto,
			'pelfechaestreno' => $this-> pelfechaestreno
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Pelicula Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Pelicula::where('id', $id);
            $record->delete();
        }
    }
}
