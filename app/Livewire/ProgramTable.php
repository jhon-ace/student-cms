<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Program;
class ProgramTable extends Component
{
    public $search = '';
    public $perPage = 10;

    public function render()
    {
        $programs = Program::where('program_abbreviation', 'like', '%' . $this->search . '%')
                     ->orWhere('program_description', 'like', '%' . $this->search . '%')
                     ->paginate($this->perPage);

        return view('livewire.program-table', [
            'programs' => $programs
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.program-table');
    // }
}
