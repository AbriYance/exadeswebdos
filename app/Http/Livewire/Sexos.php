<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Sexo;

class Sexos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $sexnombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.sexos.view', [
            'sexos' => Sexo::latest()
						->orWhere('sexnombre', 'LIKE', $keyWord)
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
		$this->sexnombre = null;
    }

    public function store()
    {
        $this->validate([
		'sexnombre' => 'required',
        ]);

        Sexo::create([ 
			'sexnombre' => $this-> sexnombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Sexo Successfully created.');
    }

    public function edit($id)
    {
        $record = Sexo::findOrFail($id);

        $this->selected_id = $id; 
		$this->sexnombre = $record-> sexnombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'sexnombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Sexo::find($this->selected_id);
            $record->update([ 
			'sexnombre' => $this-> sexnombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Sexo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Sexo::where('id', $id);
            $record->delete();
        }
    }
}
