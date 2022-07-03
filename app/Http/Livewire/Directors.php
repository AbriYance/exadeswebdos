<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Director;

class Directors extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $dirnombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.directors.view', [
            'directors' => Director::latest()
						->orWhere('dirnombre', 'LIKE', $keyWord)
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
		$this->dirnombre = null;
    }

    public function store()
    {
        $this->validate([
		'dirnombre' => 'required',
        ]);

        Director::create([ 
			'dirnombre' => $this-> dirnombre
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Director Successfully created.');
    }

    public function edit($id)
    {
        $record = Director::findOrFail($id);

        $this->selected_id = $id; 
		$this->dirnombre = $record-> dirnombre;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'dirnombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Director::find($this->selected_id);
            $record->update([ 
			'dirnombre' => $this-> dirnombre
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Director Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Director::where('id', $id);
            $record->delete();
        }
    }
}
