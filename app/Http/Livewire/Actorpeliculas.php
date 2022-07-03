<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actorpelicula;
use App\Models\Pelicula;
use App\Models\Actor;

class Actorpeliculas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $act_id, $pel_id, $aplpapel;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $actores = Actor::pluck('actnombre', 'id');
        $peliculas = Pelicula::pluck('pelnombre', 'id');
        return view('livewire.actorpeliculas.view', ['actores' => $actores, 'peliculas' => $peliculas], [
            'actorpeliculas' => Actorpelicula::latest()
						->orWhere('act_id', 'LIKE', $keyWord)
						->orWhere('pel_id', 'LIKE', $keyWord)
						->orWhere('aplpapel', 'LIKE', $keyWord)
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
		$this->act_id = null;
		$this->pel_id = null;
		$this->aplpapel = null;
    }

    public function store()
    {
        $this->validate([
		'act_id' => 'required',
		'pel_id' => 'required',
		'aplpapel' => 'required',
        ]);

        Actorpelicula::create([ 
			'act_id' => $this-> act_id,
			'pel_id' => $this-> pel_id,
			'aplpapel' => $this-> aplpapel
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Actorpelicula Successfully created.');
    }

    public function edit($id)
    {
        $record = Actorpelicula::findOrFail($id);

        $this->selected_id = $id; 
		$this->act_id = $record-> act_id;
		$this->pel_id = $record-> pel_id;
		$this->aplpapel = $record-> aplpapel;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'act_id' => 'required',
		'pel_id' => 'required',
		'aplpapel' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Actorpelicula::find($this->selected_id);
            $record->update([ 
			'act_id' => $this-> act_id,
			'pel_id' => $this-> pel_id,
			'aplpapel' => $this-> aplpapel
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Actorpelicula Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Actorpelicula::where('id', $id);
            $record->delete();
        }
    }
}
