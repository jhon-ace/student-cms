<?php

namespace App\Livewire;
use App\Models\Program;
use Livewire\Component;

class HandlingModal extends Component
{
    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.handling-modal');
    }
}
