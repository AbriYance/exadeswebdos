<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Genero;

class Generos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $gennombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.generos.view', [
            'generos' => Genero::latest()
						->orWhere('gennombre', 'LIKE', $keyWord)
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
		$this->gennombre = null;
    }

    public function store()
    {
        $this->validate([
		'gennombre' => 'required',
        ]);

        Genero::create([ 
			'gennombre' => $this-> gennombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Genero Successfully created.');
    }

    public function edit($id)
    {
        $record = Genero::findOrFail($id);

        $this->selected_id = $id; 
		$this->gennombre = $record-> gennombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'gennombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Genero::find($this->selected_id);
            $record->update([ 
			'gennombre' => $this-> gennombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Genero Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Genero::where('id', $id);
            $record->delete();
        }
    }
}
