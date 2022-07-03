<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Actor;
use App\Models\Sexo;

class Actors extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $sex_id, $actnombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        $sexos = Sexo::pluck('sexnombre', 'id');
        return view('livewire.actors.view',['sexos' => $sexos], [
            'actors' => Actor::latest()
						->orWhere('sex_id', 'LIKE', $keyWord)
						->orWhere('actnombre', 'LIKE', $keyWord)
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
		$this->sex_id = null;
		$this->actnombre = null;
    }

    public function store()
    {
        $this->validate([
		'sex_id' => 'required',
		'actnombre' => 'required',
        ]);

        Actor::create([ 
			'sex_id' => $this-> sex_id,
			'actnombre' => $this-> actnombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Actor Successfully created.');
    }

    public function edit($id)
    {
        $record = Actor::findOrFail($id);

        $this->selected_id = $id; 
		$this->sex_id = $record-> sex_id;
		$this->actnombre = $record-> actnombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'sex_id' => 'required',
		'actnombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Actor::find($this->selected_id);
            $record->update([ 
			'sex_id' => $this-> sex_id,
			'actnombre' => $this-> actnombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Actor Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Actor::where('id', $id);
            $record->delete();
        }
    }
}
