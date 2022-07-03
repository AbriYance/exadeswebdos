<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alquiler;
use App\Models\Socio;
use App\Models\Pelicula;

class Alquilers extends Component
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
        return view('livewire.alquilers.view', ['socios' => $socios, 'peliculas' => $peliculas],[
            'alquilers' => Alquiler::latest()
						->orWhere('soc_id', 'LIKE', $keyWord)
						->orWhere('pel_id', 'LIKE', $keyWord)
						->orWhere('alqfechadesde', 'LIKE', $keyWord)
						->orWhere('alqfechahasta', 'LIKE', $keyWord)
						->orWhere('alqcosto', 'LIKE', $keyWord)
						->orWhere('alqfechaentrega', 'LIKE', $keyWord)
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
		$this->soc_id = null;
		$this->pel_id = null;
		$this->alqfechadesde = null;
		$this->alqfechahasta = null;
		$this->alqcosto = null;
		$this->alqfechaentrega = null;
    }

    public function store()
    {
        $this->validate([
		'soc_id' => 'required',
		'pel_id' => 'required',
		'alqfechadesde' => 'required',
		'alqfechahasta' => 'required',
		'alqcosto' => 'required',
		'alqfechaentrega' => 'required',
        ]);

        Alquiler::create([ 
			'soc_id' => $this-> soc_id,
			'pel_id' => $this-> pel_id,
			'alqfechadesde' => $this-> alqfechadesde,
			'alqfechahasta' => $this-> alqfechahasta,
			'alqcosto' => $this-> alqcosto,
			'alqfechaentrega' => $this-> alqfechaentrega
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Alquiler Successfully created.');
    }

    public function edit($id)
    {
        $record = Alquiler::findOrFail($id);

        $this->selected_id = $id; 
		$this->soc_id = $record-> soc_id;
		$this->pel_id = $record-> pel_id;
		$this->alqfechadesde = $record-> alqfechadesde;
		$this->alqfechahasta = $record-> alqfechahasta;
		$this->alqcosto = $record-> alqcosto;
		$this->alqfechaentrega = $record-> alqfechaentrega;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'soc_id' => 'required',
		'pel_id' => 'required',
		'alqfechadesde' => 'required',
		'alqfechahasta' => 'required',
		'alqcosto' => 'required',
		'alqfechaentrega' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Alquiler::find($this->selected_id);
            $record->update([ 
			'soc_id' => $this-> soc_id,
			'pel_id' => $this-> pel_id,
			'alqfechadesde' => $this-> alqfechadesde,
			'alqfechahasta' => $this-> alqfechahasta,
			'alqcosto' => $this-> alqcosto,
			'alqfechaentrega' => $this-> alqfechaentrega
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Alquiler Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Alquiler::where('id', $id);
            $record->delete();
        }
    }
}
