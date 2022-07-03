<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Socio;

class Socios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $soccedula, $socnombre, $socdireccion, $soctelefono, $soccorreo;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.socios.view', [
            'socios' => Socio::latest()
						->orWhere('soccedula', 'LIKE', $keyWord)
						->orWhere('socnombre', 'LIKE', $keyWord)
						->orWhere('socdireccion', 'LIKE', $keyWord)
						->orWhere('soctelefono', 'LIKE', $keyWord)
						->orWhere('soccorreo', 'LIKE', $keyWord)
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
		$this->soccedula = null;
		$this->socnombre = null;
		$this->socdireccion = null;
		$this->soctelefono = null;
		$this->soccorreo = null;
    }

    public function store()
    {
        $this->validate([
		'soccedula' => 'required',
		'socnombre' => 'required',
		'socdireccion' => 'required',
		'soctelefono' => 'required',
		'soccorreo' => 'required',
        ]);

        Socio::create([ 
			'soccedula' => $this-> soccedula,
			'socnombre' => $this-> socnombre,
			'socdireccion' => $this-> socdireccion,
			'soctelefono' => $this-> soctelefono,
			'soccorreo' => $this-> soccorreo
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Socio Successfully created.');
    }

    public function edit($id)
    {
        $record = Socio::findOrFail($id);

        $this->selected_id = $id; 
		$this->soccedula = $record-> soccedula;
		$this->socnombre = $record-> socnombre;
		$this->socdireccion = $record-> socdireccion;
		$this->soctelefono = $record-> soctelefono;
		$this->soccorreo = $record-> soccorreo;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'soccedula' => 'required',
		'socnombre' => 'required',
		'socdireccion' => 'required',
		'soctelefono' => 'required',
		'soccorreo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Socio::find($this->selected_id);
            $record->update([ 
			'soccedula' => $this-> soccedula,
			'socnombre' => $this-> socnombre,
			'socdireccion' => $this-> socdireccion,
			'soctelefono' => $this-> soctelefono,
			'soccorreo' => $this-> soccorreo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Socio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Socio::where('id', $id);
            $record->delete();
        }
    }
}
