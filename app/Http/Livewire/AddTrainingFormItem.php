<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddTrainingFormItem extends Component
{
    public $item;
    
    public function render()
    {
        return view('livewire.add-training-form-item');
    }

    public function mount($item) 
    {
        $this->item = $item;
    }
}
