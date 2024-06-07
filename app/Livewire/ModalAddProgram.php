<?php

namespace App\Livewire;

use Livewire\Component;

class ModalAddProgram extends Component
{
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $refresh = false;



    public function openEditModal()
    {
        $this->showEditModal = true;
        $this->refresh = !$this->refresh; // Trigger refresh
    }

    public function hideEditModal()
    {
        $this->showEditModal = false;

        $this->dispatch('cancelClicked');

    }

    public function render()
    {
        return view('livewire.modal-add-program');
        
    }
}
