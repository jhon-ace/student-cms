<?php

namespace App\Livewire;

use \App\Models\Program; 
use Livewire\Component;
use Livewire\WithPagination;

class ProgramShowTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.program-show-table', [
            'programs' => Program::where('program_abbreviation', 'like', '%' . $this->search . '%')
            ->orWhere('program_description', 'like', '%' . $this->search . '%')->paginate(10),
        ]);
    }
}
