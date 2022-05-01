<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddTrainingForm extends Component
{
    public $recruteur;
    public $trainingItems = [];

    public function render()
    {
        return view('livewire.add-training-form');
    }

    public function increment() 
    {
        array_push($this->trainingItems, $this->trainingItem());
    }

    public function mount($recruteur)
    {
        $this->recruteur = $recruteur;

        $this->trainingItems = [$this->trainingItem()];
    }

    private function trainingItem()
    {
        return [
            'formation' => '',
            'etablissement' => '',
            'ville' => '',
            'date_debut' => '',
            'date_fin' => '',
            'description' => '',
        ];
    }
}
